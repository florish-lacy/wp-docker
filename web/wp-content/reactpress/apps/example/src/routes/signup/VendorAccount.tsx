import { useRouteLoaderData } from "react-router-dom";

export const VendorAccount: React.FC = () => {
	const { currentUser } = useRouteLoaderData("root");

	if (currentUser) {
		return <div>Vendor Account for {currentUser.name}</div>;
	}

	return <div>Vendor Account</div>;
};
