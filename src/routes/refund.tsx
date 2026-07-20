import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/refund")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="refund" />;
}
