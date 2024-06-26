import { Toaster } from "@/components/ui/sonner";
import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App.tsx";
import reportWebVitals from "./lib/reportWebVitals";

// Global styles
import { TooltipProvider } from "./components/ui/tooltip.tsx";
import "./styles/main.css";

ReactDOM.createRoot(document.getElementById("root")!).render(
	<React.StrictMode>
		<TooltipProvider>
			<App />
			<Toaster theme="light" richColors toastOptions={{}} />
		</TooltipProvider>
	</React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
