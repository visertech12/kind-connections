import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/domain/register")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="domain/register" />;
}
