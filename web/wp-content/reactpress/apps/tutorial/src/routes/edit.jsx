import { Form, redirect, useLoaderData, useNavigate } from "react-router-dom";
import { updateContact, uploadImage } from "../api";
import reactPress from "../lib/reactpress";


export async function editAction({ request, params }) {
	const formData = await request.formData()
	const updates = Object.fromEntries(formData);

	const inputFile = document.getElementById('avatar')

	if (updates.avatar && inputFile?.files && inputFile.files.length > 0) {
		const uploadedImage = await uploadImage({
			alt_text: `${updates.first_name} ${updates.last_name}'s profile image`,
			file: inputFile.files[0],
			title: `${updates.first_name} ${updates.last_name}`,
		})
			.catch((e) => { console.warn(e) })
		await updateContact(params.contactId, {
			...updates,
			simple_local_avatar: { media_id: uploadedImage.id }
		})
			.catch((e) => { console.warn(e) })
	} else {
		await updateContact(params.contactId, updates)
			.catch((e) => { console.warn(e) })

	}

	return redirect(`/contacts/${params.contactId}`);
}

export default function EditContact() {
	const contact = useLoaderData()
	const navigate = useNavigate()


	// 👉 Redirect to the error page if the user wants to edit or delete another user
	if (
		!reactPress?.user?.roles?.includes('administrator') &&
		reactPress?.user?.ID !== contact?.id
	) {
		throw new Response('', {
			status: 403,
			statusText: 'You do not have permission to access this page.',
		})
	}

	return (
		<Form className="row g-3" method="post" id="contact-form">
			<div className="col-md-6">
				<label htmlFor="first" className="form-label">
					First Name
				</label>
				<input
					className="form-control"
					defaultValue={contact.first_name}
					name="first_name"

					placeholder="First"
					type="text"
				/>
			</div>
			<div className="col-md-6">
				<label htmlFor="last" className="form-label">
					Last Name
				</label>
				<input
					className="form-control"
					defaultValue={contact.last_name}
					name="last_name"
					placeholder="Last"
					type="text"
				/>
			</div>
			<div className="col-12">
				<label htmlFor="url" className="form-label">
					Url
				</label>
				<input
					type="text"
					className="form-control"
					name="url"
					placeholder="https://example.com"
					defaultValue={contact.url}
				/>
			</div>
			<div className="col-md-12">
				<label htmlFor="avatar" className="form-label">
					Avatar
				</label>
				<input type="file" className="form-control" id="avatar" name="avatar" />
			</div>
			<div className="col-md-12">
				<label htmlFor="description" className="form-label">
					Description
				</label>
				<textarea
					className="form-control"
					defaultValue={contact.description}
					name="description"
					rows={6}
					style={{ height: 'calc(5 * 2.5rem' }}
				/>
			</div>
			<div className="col-12 d-flex gap-2">
				<button type="submit" className="btn btn-outline-primary">
					Save
				</button>
				<button type="button" className="btn btn-outline-secondary" onClick={() => navigate(-1)}
				>
					Cancel
				</button>
			</div>
		</Form>
	)
}
