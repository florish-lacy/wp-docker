import { Link, RouterProvider, createHashRouter } from "react-router-dom";

import ErrorPage from "./routes/error/ErrorPage";
import Root, { rootAction, rootLoader } from "./routes/root/RootPage";
import Contact, { userLoader } from "./routes/users/User";

export const slugs = {
	user: "users",
};

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
				element: <h1>h1</h1>,
			},
			{
				path: `${slugs.user}/:id`,
				loader: userLoader,
				element: (
					<>
						<Contact />
						<div>
							Hola WordPress!<Link to="/">hi</Link>
						</div>
					</>
				),
			},
		],
	},
]);

function App() {
	return <RouterProvider router={router} />;
}

export default App;
