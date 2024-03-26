import { createContact, uploadImage } from "@/api/users"
import { ActionFunctionArgs, redirect } from "react-router-dom"

export async function newAction({ request }: ActionFunctionArgs) {
	const formData = await request.formData()
	const updates = Object.fromEntries(formData)
	if (updates.avatar) {
		const inputFile = document.getElementById('avatar')
		const uploadedImage = await uploadImage({
			alt_text: `${updates.first_name} ${updates.last_name}'s profile image`,
			file: inputFile?.files[0],
			title: `${updates.first_name} ${updates.last_name}`,
		})
		const response = await createContact({
			...updates,
			simple_local_avatar: { media_id: uploadedImage.id },
		})
		return redirect(`/users/${response.id}`)
	} else {
		const response = await createContact(updates)
			.catch((e) => {
				console.warn(e)
			})
		return redirect(`/users/${response?.id || ""}`)

	}
}
