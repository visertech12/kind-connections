import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/login")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="login" />;
}
