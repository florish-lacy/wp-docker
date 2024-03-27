import { RouterProvider, createHashRouter } from "react-router-dom";

import { slugs } from "./config/slugs";
import { Dashboard } from "./routes/dashboard/Dashboard";
import ErrorPage from "./routes/error/ErrorPage";
import Root from "./routes/root/RootPage";
import { rootAction } from "./routes/root/rootAction";
import { rootLoader } from "./routes/root/rootLoader";
import DeliveryDetails from "./routes/signup/DeliveryDetails";
import VendorInformation from "./routes/signup/VendorInformation";
import NewUser from "./routes/users/New";
import Contact, { userLoader } from "./routes/users/User";
import { newAction } from "./routes/users/newAction";

const router = createHashRouter([
	{
		path: "/",
		element: <Root />,
		errorElement: <ErrorPage />,
		action: rootAction,
		loader: rootLoader,
		children: [
			{
				index: true,
				element: <Dashboard />,
			},
			{
				path: `approval`,

				element: <DeliveryDetails />,
			},
			{
				path: slugs.user,
				element: <Root />,
				loader: rootLoader,
			},
			{
				path: `${slugs.user}/:id`,
				loader: userLoader,
				element: <Contact />,
			},
			{
				path: `${slugs.user}/new`,
				action: newAction,
				element: <NewUser />,
			},
			{
				path: `${slugs.user}/edit`,
				action: newAction,
				element: <VendorInformation />,
			},
		],
	},
]);

function App() {
	return <RouterProvider router={router} />;
}

export default App;
