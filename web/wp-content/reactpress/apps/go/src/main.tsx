// https://rockiger.com/en/reactpress/reactpress-tutorial
import React from "react";
import ReactDOM from "react-dom/client";
import { RouterProvider, createHashRouter } from "react-router-dom";
import Root, { rootAction, rootLoader } from "./routes/Root";

import "./globals.css";
import Contact, { contactLoader } from "./routes/Contact";
import ErrorPage from "./routes/ErrorElement";
import Index from "./routes/IndexPage";
const router = createHashRouter([
	{
		path: "/",
		element: <Root />,
		errorElement: <ErrorPage />,
		loader: rootLoader,
		action: rootAction,
		children: [
			{
				errorElement: <ErrorPage />,
				children: [
					{ index: true, element: <Index /> },

					{
						path: "contacts/:contactId",
						element: <Contact />,
						loader: contactLoader,
					},
					{
						path: "contacts/new",
						element: <Index />,
						loader: contactLoader,
					},
				],
			},
		],
	},
]);

ReactDOM.createRoot(document.getElementById("root")!).render(
	<React.StrictMode>
		<RouterProvider router={router} />
	</React.StrictMode>
);
