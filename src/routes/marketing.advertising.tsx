import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/marketing/advertising")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="marketing/advertising" />;
}
