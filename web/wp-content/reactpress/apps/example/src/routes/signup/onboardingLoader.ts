import { getCurrentUser } from "@/api/api";
import { LoaderFunction } from "react-router-dom";

export const onboardingLoader: LoaderFunction = async () => {
	const currentUser = await getCurrentUser();
	return { currentUser };
}
