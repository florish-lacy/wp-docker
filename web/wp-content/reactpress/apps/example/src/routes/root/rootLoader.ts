import { getCurrentUser, getUserById, getUsers } from "@/api/api";
import { LoaderFunction } from "react-router-dom";

export const rootLoader: LoaderFunction = async ({ params, request }) => {
	// Get query parameter "q" from the URL
	const url = new URL(request.url);
	const q = url.searchParams.get("q") || "";

	// Get all users
	const users = await getUsers(q);

	// Get the current user
	const currentUser = await getCurrentUser();
	let user = currentUser;

	if (params?.id) {
		await getUserById(parseInt(params.id || "", 10))
			.then((response) => {
				user = response;
			})
			.catch((error) => {
				console.error(error);
			});

	}

	// A Florish admin may be a vendor, customer, or both
	const isSuperAdmin = currentUser?.is_super_admin;
	const isAdmin = currentUser?.roles.includes("administrator");
	const isVendor = currentUser?.roles.includes("vendor");
	const isCustomer = currentUser?.roles.includes("customer");

	return { currentUser, isAdmin, isSuperAdmin, isCustomer, isVendor, q, user, users };
}
