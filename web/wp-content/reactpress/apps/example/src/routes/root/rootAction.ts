import { slugs } from "@/config/slugs";
import { redirect } from "react-router-dom";

//  If there is an unknown action, redirect
export async function rootAction() {
	return redirect(slugs.signup);
}
