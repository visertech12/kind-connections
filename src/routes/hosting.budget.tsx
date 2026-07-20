import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/hosting/budget")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="hosting/budget" />;
}
