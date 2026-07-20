import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/service/web")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="service/web" />;
}
