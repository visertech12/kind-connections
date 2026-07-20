<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $pageTitle = 'Products';
        $products  = Product::with('category')
            ->when(request('search'), fn($q) => $q->where('name', 'like', '%' . request('search') . '%'))
            ->when(request('status') !== null && request('status') !== '', fn($q) => $q->where('status', request('status')))
            ->latest()
            ->paginate(15);

        return view('admin.product.index', compact('pageTitle', 'products'));
    }

    public function create()
    {
        $pageTitle  = 'Add New Product';
        $categories = Category::where('status', 1)->orderBy('name')->get();
        return view('admin.product.create', compact('pageTitle', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'category_id'   => 'required|integer|exists:categories,id',
            'regular_price' => 'required|numeric|min:0',
            'description'   => 'required',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'seo_title'       => 'nullable|string|max:160',
            'seo_description' => 'nullable|string|max:320',
            'seo_keywords'    => 'nullable|string|max:255',
            'file_link'       => 'nullable|url',
        ]);

        $product                = new Product();
        $product->name          = $request->name;
        $product->slug          = $this->makeSlug($request->name);
        $product->category_id   = $request->category_id;
        $product->regular_price = $request->free_price_override == '1' ? 0 : $request->regular_price;
        $product->description   = $request->description;
        $product->status        = $request->status ?? 1;
        $product->featured      = $request->featured ? 1 : 0;
        $product->seo_title       = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->seo_keywords    = $request->seo_keywords;
        $product->file_link       = $request->file_link;
        
        $attrs = [];
        if ($request->demo_url) {
            $attrs['Demo URL'] = $request->demo_url;
        }
        if ($request->extended_price > 0 && $request->free_price_override != '1') {
            $attrs['Extended Price'] = $request->extended_price;
        }
        if ($request->filled('install_fee') && (float) $request->install_fee > 0) {
            $attrs['Install Fee'] = (float) $request->install_fee;
        }
        if ($request->has('detail_keys') && is_array($request->detail_keys)) {
            foreach ($request->detail_keys as $index => $key) {
                if (!empty($key)) {
                    $attrs[$key] = $request->detail_values[$index] ?? '';
                }
            }
        }
        $product->setAttribute('attributes', $attrs);

        if ($request->hasFile('image')) {
            $path = dirname(base_path()) . '/assets/images/products';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $websiteName = 'Unlock Themes';
            $productSlugName = $product->slug ?: $this->makeSlug($request->name);
            $customFilename = $websiteName . '_' . $productSlugName;
            $product->image = uploadImage($request->file('image'), $path, '800x500', null, null, $customFilename);
        } elseif ($request->filled('image_path_manual')) {
            $product->image = $request->image_path_manual;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $pageTitle  = 'Edit Product';
        $product    = Product::findOrFail($id);
        $categories = Category::where('status', 1)->orderBy('name')->get();
        return view('admin.product.edit', compact('pageTitle', 'product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name'          => 'required|max:255',
            'category_id'   => 'required|integer|exists:categories,id',
            'regular_price' => 'required|numeric|min:0',
            'description'   => 'required',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'seo_title'       => 'nullable|string|max:160',
            'seo_description' => 'nullable|string|max:320',
            'seo_keywords'    => 'nullable|string|max:255',
            'file_link'       => 'nullable|url',
        ]);

        $product->name          = $request->name;
        $product->slug          = $this->makeSlug($request->name, $product->id);
        $product->category_id   = $request->category_id;
        $product->regular_price = $request->free_price_override == '1' ? 0 : $request->regular_price;
        $product->description   = $request->description;
        $product->status        = $request->status ?? 0;
        $product->featured      = $request->featured ? 1 : 0;
        $product->seo_title       = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->seo_keywords    = $request->seo_keywords;
        $product->file_link       = $request->file_link;

        $attrs = [];
        if ($request->demo_url) {
            $attrs['Demo URL'] = $request->demo_url;
        }
        if ($request->extended_price > 0 && $request->free_price_override != '1') {
            $attrs['Extended Price'] = $request->extended_price;
        }
        if ($request->filled('install_fee') && (float) $request->install_fee > 0) {
            $attrs['Install Fee'] = (float) $request->install_fee;
        }
        if ($request->has('detail_keys') && is_array($request->detail_keys)) {
            foreach ($request->detail_keys as $index => $key) {
                if (!empty($key)) {
                    $attrs[$key] = $request->detail_values[$index] ?? '';
                }
            }
        }
        $product->setAttribute('attributes', $attrs);

        if ($request->hasFile('image')) {
            $path  = dirname(base_path()) . '/assets/images/products';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $old   = $product->image;
            // Only remove if it's a local file (not a URL)
            if ($old && !str_starts_with($old, 'http')) {
                @unlink($path . '/' . $old);
            }
            $websiteName = 'Unlock Themes';
            $productSlugName = $product->slug ?: $this->makeSlug($request->name, $product->id);
            $customFilename = $websiteName . '_' . $productSlugName;
            $product->image = uploadImage($request->file('image'), $path, '800x500', null, null, $customFilename);
        } elseif ($request->has('image_path_manual')) {
            $product->image = $request->image_path_manual;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        // Only delete local files, not URLs
        if ($product->image && !str_starts_with($product->image, 'http')) {
            @unlink(dirname(base_path()) . '/assets/images/products/' . $product->image);
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }

    // ---- Helpers ----

    private function makeSlug(string $name, $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i    = 1;
        while (Product::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }

    // ---- Envato Import ----

    public function envatoImport()
    {
        $pageTitle  = 'Import from Envato';
        $categories = Category::where('status', 1)->orderBy('name')->get();
        $gs         = \App\Models\GeneralSetting::first();
        $token      = $gs->envato_token ?? env('ENVATO_TOKEN', '');
        return view('admin.product.envato_import', compact('pageTitle', 'categories', 'token'));
    }

    public function envatoImportStore(Request $request)
    {
        $request->validate([
            'envato_token'  => 'required|string',
            'item_id'       => 'required|numeric',
            'category_id'   => 'required|integer|exists:categories,id',
            'status'        => 'nullable|in:0,1',
            'script_file'   => 'nullable|string|max:50',
            'is_free'       => 'required|in:0,1',
        ]);

        // 1. Hit Envato API
        $response = Http::withToken($request->envato_token)
            ->get('https://api.envato.com/v3/market/catalog/item', [
                'id' => $request->item_id,
            ]);

        if (!$response->successful()) {
            return back()->withInput()->with('error', 'Envato API error: ' . $response->status() . ' — ' . $response->body());
        }

        $item = $response->json();

        if (empty($item['id'])) {
            return back()->withInput()->with('error', 'Invalid response from Envato API. Make sure the Item ID is correct.');
        }

        // 2. Build attributes from Envato attributes array
        $attrs = [];
        if (!empty($item['url'])) {
            $attrs['Demo URL'] = $item['url'];
        }
        if (!empty($item['attributes']) && is_array($item['attributes'])) {
            foreach ($item['attributes'] as $attr) {
                $label = $attr['label'] ?? $attr['name'] ?? null;
                $value = $attr['value'] ?? null;
                if ($label && $value !== null) {
                    // Envato sometimes returns array values (e.g. ["Chrome","Firefox"])
                    // Flatten them to a comma-separated string so they render safely in HTML inputs
                    if (is_array($value)) {
                        $value = implode(', ', array_filter(array_map('strval', $value)));
                    }
                    $attrs[$label] = (string) $value;
                }
            }
        }

        // Download landscape_url as primary thumbnail, fall back to large_url then thumbnail_url
        $thumbUrl = $item['previews']['landscape_url']
            ?? $item['previews']['icon_with_landscape_url']
            ?? null;

        // Also try nested array format from Envato API v3
        if (!$thumbUrl && !empty($item['previews']) && is_array($item['previews'])) {
            foreach ($item['previews'] as $preview) {
                if (is_array($preview)) {
                    $thumbUrl = $preview['landscape_url']
                        ?? $preview['large_url']
                        ?? null;
                    if ($thumbUrl) break;
                }
            }
        }

        // Final fallback to thumbnail_url
        if (!$thumbUrl) {
            $thumbUrl = $item['thumbnail_url'] ?? null;
        }

        if ($thumbUrl) {
            try {
                $imgContent = Http::timeout(30)->get($thumbUrl)->body();
                $ext        = pathinfo(parse_url($thumbUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                // Strip query strings from extension
                $ext        = explode('?', $ext)[0];
                $imageName  = 'envato_' . Str::random(16) . '.' . $ext;
                $savePath   = dirname(base_path()) . '/assets/images/products';
                if (!is_dir($savePath)) {
                    mkdir($savePath, 0755, true);
                }
                file_put_contents($savePath . '/' . $imageName, $imgContent);
            } catch (\Throwable $e) {
                // thumbnail download failed — continue without image
                $imageName = null;
            }
        }

        // 4. Build price (cents → dollars); force 0 if free
        $isFree = (int) $request->is_free;
        if ($isFree) {
            $price = 0;
        } else {
            $price = isset($item['price_cents']) ? round($item['price_cents'] / 100, 2) : 0;
        }

        // 6. Build description
        $description = $item['description'] ?? $item['summary'] ?? '';

        // Extract tags for SEO keywords and attributes
        $tagsList = '';
        if (!empty($item['tags']) && is_array($item['tags'])) {
            $tagsList = implode(', ', $item['tags']);
            $attrs['Tags'] = $tagsList;
        }

        // 7. Create the product
        $product              = new Product();
        $productName          = $item['name'];
        if (!empty($request->version_code)) {
            $productName .= ' ' . $request->version_code;
        }
        $product->name        = $productName;
        $product->slug        = $this->makeSlug($productName);
        $product->category_id = $request->category_id;
        $product->regular_price = $price;
        $product->description  = $description;
        $product->image        = $imageName;
        $product->status       = $request->status ?? 1;
        $product->featured     = $request->has('featured') ? 1 : 0;
        $product->setAttribute('attributes', $attrs);
        $product->version_code = $request->version_code ?? null;
        $product->seo_keywords = $tagsList ?: null;
        $product->is_free      = $isFree;
        $product->save();

        return redirect()->route('admin.product.edit', $product->id)
            ->with('success', 'Product "' . $product->name . '" imported from Envato successfully! Please review and save.');
    }

    public function inspectSeo($id)
    {
        $product = Product::findOrFail($id);
        $url = route('product.details', $product->slug);
        
        // Try to construct base site URL
        // For Domain Properties in GSC, the format must be sc-domain:example.com
        $parsedUrl = parse_url($url);
        $host = $parsedUrl['host'] ?? '';
        // Remove www. if present for domain property
        $host = preg_replace('/^www\./', '', $host);
        $siteUrl = 'sc-domain:' . $host;

        $authConfigPath = storage_path('google_auth_config.json');

        if (!file_exists($authConfigPath)) {
            $pageTitle = "Google URL Inspection Setup Required";
            return view('admin.product.seo_inspect_setup', compact('pageTitle', 'product', 'url', 'authConfigPath'));
        }

        try {
            $client = new \Google\Client();
            $client->setAuthConfig($authConfigPath);
            $client->addScope('https://www.googleapis.com/auth/webmasters.readonly');

            $searchConsoleService = new \Google\Service\SearchConsole($client);

            $request = new \Google\Service\SearchConsole\InspectUrlIndexRequest();
            $request->setSiteUrl($siteUrl);
            $request->setInspectionUrl($url);

            $response = $searchConsoleService->urlInspection_index->inspect($request);
            $inspectionResult = $response->getInspectionResult();
            $indexStatusResult = $inspectionResult->getIndexStatusResult();

            $pageTitle = "SEO Inspection Result: " . $product->name;
            return view('admin.product.seo_inspect_result', compact('pageTitle', 'product', 'url', 'indexStatusResult'));
        } catch (\Exception $e) {
            $pageTitle = "SEO Inspection Error";
            $error = $e->getMessage();
            $debugInfo = [
                'siteUrl_sent'        => $siteUrl,
                'inspectionUrl_sent'  => $url,
                'authConfig_exists'   => file_exists($authConfigPath) ? 'Yes' : 'No',
                'authConfig_path'     => $authConfigPath,
            ];
            return view('admin.product.seo_inspect_error', compact('pageTitle', 'product', 'url', 'error', 'siteUrl', 'debugInfo'));
        }
    }
}
