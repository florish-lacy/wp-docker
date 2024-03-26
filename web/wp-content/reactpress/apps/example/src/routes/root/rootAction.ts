import { slugs } from "@/config/slugs";
import { redirect } from "react-router-dom";

export async function rootAction() {
	return redirect(`/${slugs.user}/new`);
}
