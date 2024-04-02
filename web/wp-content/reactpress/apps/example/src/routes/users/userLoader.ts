import { getUserById } from "@/api/api";
import { LoaderFunctionArgs } from "react-router-dom";

export async function userLoader({ params }: LoaderFunctionArgs) {
	const user = await getUserById(parseInt(params.id || "", 10));
	return { user };
}
