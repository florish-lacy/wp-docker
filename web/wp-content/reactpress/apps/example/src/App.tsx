import { RouterProvider, createHashRouter } from "react-router-dom";

import { Analytics } from "./components/dashboard/Analytics";
import { Dashboard } from "./components/dashboard/Dashboard";
import { EditProduct } from "./components/dashboard/EditProduct";
import Inventory from "./components/dashboard/Inventory";
import { Orders } from "./components/dashboard/Orders";
import { Products } from "./components/dashboard/Products";
import { Settings } from "./components/settings/Settings";
import { slugs } from "./config/slugs";
import AccountPage from "./routes/account/AccountPage";
import ErrorPage from "./routes/error/ErrorPage";
import LoginPage from "./routes/login/LoginPage";
import Root from "./routes/root/RootPage";
import { rootAction } from "./routes/root/rootAction";
import { rootLoader } from "./routes/root/rootLoader";
import CreateUser from "./routes/signup/CreateUser";
import DeliveryDetails from "./routes/signup/DeliveryDetails";
import Onboarding from "./routes/signup/Onboarding";
import VendorInformation from "./routes/signup/VendorInformation";
import { actionCreateUser } from "./routes/signup/actionCreateUser";
import { onboardingLoader } from "./routes/signup/onboardingLoader";
import { userLoader } from "./routes/users/userLoader";

const router = createHashRouter([
	{
		id: "root", // This allows us to use useRouteLoaderData("root") in children - https://reactrouter.com/en/main/hooks/use-route-loader-data
		path: "/",
		element: <Root />,
		errorElement: <ErrorPage />,
		action: rootAction,
		loader: rootLoader,
		children: [
			{
				index: true,
				element: <AccountPage />,
			},
			{
				path: `:id`,
				element: <AccountPage />,
				loader: userLoader,
			},
			{
				path: slugs.signup,
				element: <CreateUser />,
				errorElement: <CreateUser />, // Allows us to show the form again if there is an error
				action: actionCreateUser,
			},
			{
				path: slugs.login,
				element: <LoginPage />,
			},
			{
				path: slugs.settings,
				element: <Settings />,
			},
			{
				path: `onboarding`,
				element: <Onboarding />,
				loader: onboardingLoader,
			},
			{
				path: `approval`,

				element: <DeliveryDetails />,
			},
			{
				path: `business-information`,
				element: <VendorInformation />,
			},
			{
				path: slugs.dashboard,
				element: <Dashboard />,
				children: [
					{
						index: true,
						element: <Analytics />,
					},
					{
						path: slugs.orders,
						element: <Orders />,
					},
					{
						path: slugs.products,
						element: <Products />,
						children: [
							{
								path: `:id`,
								element: <EditProduct />,
							},
						],
					},
					{
						path: slugs.inventory,
						element: <Inventory />,
					},
					{
						path: slugs.analytics,
						element: <Analytics />,
					},
				],
			},
		],
	},
]);

function App() {
	return <RouterProvider router={router} />;
}

export default App;
