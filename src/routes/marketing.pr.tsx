import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/marketing/pr")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="marketing/pr" />;
}
