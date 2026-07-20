import { useEffect } from "react";
import content from "../pages-html/content.json";

type Content = {
  header: string;
  footer: string;
  pages: Record<string, string>;
};

const data = content as Content;

export default function LaravelPage({ slug }: { slug: string }) {
  const body = data.pages[slug] ?? "";

  useEffect(() => {
    // Re-init any bootstrap components after content mounts (jQuery + bootstrap
    // are loaded globally via <script> tags in __root.tsx).
    const w = window as unknown as { jQuery?: (fn: () => void) => void };
    if (typeof w.jQuery === "function") {
      // no-op; bootstrap uses data attributes so listeners bind on load
    }
  }, [slug]);

  return (
    <>
      <div dangerouslySetInnerHTML={{ __html: data.header }} />
      <main id="main-content" dangerouslySetInnerHTML={{ __html: body }} />
      <div dangerouslySetInnerHTML={{ __html: data.footer }} />
    </>
  );
}