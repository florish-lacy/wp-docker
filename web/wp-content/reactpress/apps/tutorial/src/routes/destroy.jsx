import { redirect } from "react-router-dom";
import { deleteContact } from "../api";

export async function destroyAction({ params }) {
	await deleteContact(params.contactId);
	return redirect("/");
}
