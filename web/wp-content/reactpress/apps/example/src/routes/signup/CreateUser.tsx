import { UserSignupCard } from "@/components/user/UserSignupCard";
import { useEffect } from "react";
import { ErrorResponse, useRouteError } from "react-router-dom";
import { toast } from "sonner";
export default function CreateUser() {
	// Error handling
	const error = useRouteError() as ErrorResponse | Error; // JS error or WP REST API error
	console.error(error);

	useEffect(() => {
		if (error) {
			const status = error?.data?.status || error?.status;
			const title = error?.message || error?.statusText || "An error occurred"; //
			const description = error?.data?.params
				? Object.keys(error.data.params)
						.map((key) => error.data.params[key])
						.join(", ")
				: error?.data;
			toast.error(title, {
				description,
			});
		}
	}, [error]);

	return <UserSignupCard />;
}
