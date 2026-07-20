import { createFileRoute } from "@tanstack/react-router";

export const Route = createFileRoute("/")({
  component: Home,
});

function Home() {
  return (
    <div style={{ padding: 32, fontFamily: "system-ui" }}>
      <h1>Laravel Deploy Repository</h1>
      <p>This repo deploys the laravel/ folder to cPanel via .cpanel.yml.</p>
    </div>
  );
}