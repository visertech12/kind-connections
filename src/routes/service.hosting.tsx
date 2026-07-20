import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/service/hosting")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="service/hosting" />;
}
