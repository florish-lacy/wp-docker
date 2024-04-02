import { useRouteLoaderData } from "react-router-dom";

export default function Onboarding() {
	const { currentUser } = useRouteLoaderData("root");

	return (
		<>
			<h1>Onboarding</h1>
			You are {currentUser ? "logged in" : "not logged in"}
			{JSON.stringify(currentUser)}
		</>
	);
}
