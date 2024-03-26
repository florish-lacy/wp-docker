import { Form, redirect, useLoaderData } from 'react-router-dom'
import { createContact, uploadImage } from '../api'
import reactPress from '../lib/reactpress'

export async function newAction({ request }) {
	const formData = await request.formData()
	const updates = Object.fromEntries(formData)
	if (updates.avatar) {
		const inputFile = document.getElementById('avatar')
		const uploadedImage = await uploadImage({
			alt_text: `${updates.first_name} ${updates.last_name}'s profile image`,
			file: inputFile.files[0],
			title: `${updates.first_name} ${updates.last_name}`,
		})
		const response = await createContact({
			...updates,
			simple_local_avatar: { media_id: uploadedImage.id },
		})
		return redirect(`/contacts/${response.id}`)
	} else {
		const response = await createContact(updates)
			.then((response) => {
				if (!response.id) {
					throw new Error('No ID returned')
				}

				return redirect(`/contacts/${response.id}`)

			})
			.catch((e) => {
				console.warn(e)
				return redirect(`/`)

			})
		return response
	}
}

export default function NewContact() {
	const contact = useLoaderData()

	// 👉 Redirect to the error page if the user wants to access the “New” page
	if (!reactPress?.user?.roles?.includes('administrator')) {
		throw new Response('', {
			status: 403,
			statusText: 'You do not have permission to access this page.',
		})
	}

	return (
		<Form className="row g-3" method="post" id="contact-form">
			<div className="col-md-6">
				<label htmlFor="username" className="form-label">
					Username
				</label>
				<input
					className="form-control"
					id="username"
					name="username"
					placeholder="username"
					type="text"
				/>
			</div>
			<div className="col-md-6">
				<label htmlFor="email" className="form-label">
					E-Mail
				</label>
				<input
					className="form-control"
					id="email"
					name="email"
					placeholder="name@example.com"
					type="email"
				/>
			</div>
			<div className="col-md-6">
				<label htmlFor="first" className="form-label">
					First Name
				</label>
				<input
					className="form-control"
					defaultValue={contact?.first_name}
					id="first"
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
					defaultValue={contact?.last_name}
					id="last"
					name="last_name"
					placeholder="Last"
					type="text"
				/>
			</div>
			<div className="col-md-6">
				<label htmlFor="password" className="form-label">
					Password
				</label>
				<input
					className="form-control"
					id="password"
					name="password"
					placeholder="e.g. UX6YRGANRinm785"
					type="text"
				/>
			</div>
			<div className="col-6">
				<label htmlFor="url" className="form-label">
					Url
				</label>
				<input
					className="form-control"
					defaultValue={contact?.url}
					id="url"
					name="url"
					placeholder="https://example.com"
					type="text"
				/>
			</div>
			<div className="col-md-6">
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
					defaultValue={contact?.description}
					id="description"
					name="description"
					rows={6}
					style={{ height: 'calc(5 * 2.5rem' }}
				/>
			</div>
			<div className="col-12 d-flex gap-2">
				<button type="submit" className="btn btn-outline-primary">
					Save
				</button>
				<button type="button" className="btn btn-outline-secondary">
					Cancel
				</button>
			</div>
		</Form>
	)
}
