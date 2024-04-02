import { createUser } from "@/api/api";
import { ActionFunctionArgs, redirect } from "react-router-dom";
import { toast } from "sonner";

export async function actionCreateUser({ request }: ActionFunctionArgs) {
	const formData = await request.formData()
	const data = Object.fromEntries(formData)

	console.log('Creating user', data)

	const createdByAdmin = data.createdByAdmin === "true"
	const isVendor = data.isVendor === "on"
	const roles = [isVendor ? "vendor" : "customer"]
	const meta = {
		test: 'hello'
	}

	return await createUser({ ...data, roles, username: data.email, meta })
		.then((response) => {
			if (!response || !response.id) {
				throw new Error('There was an error creating the user.')
			}

			console.log('Created user', response.id)

			// Notify the user
			toast.success('Account created successfully. Redirecting...')

			// redirect to the account root. If admin created the user, add the user ID to the URL
			return redirect(`/${createdByAdmin ? response.id : ""}`)
		})
}
