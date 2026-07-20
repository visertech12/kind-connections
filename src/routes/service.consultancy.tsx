import { createFileRoute } from "@tanstack/react-router";
import LaravelPage from "@/components/LaravelPage";

export const Route = createFileRoute("/service/consultancy")({
  component: Page,
});

function Page() {
  return <LaravelPage slug="service/consultancy" />;
}
