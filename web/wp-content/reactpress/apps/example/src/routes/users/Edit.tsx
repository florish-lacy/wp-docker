import {
	ActionFunctionArgs,
	Form,
	redirect,
	useLoaderData,
} from "react-router-dom";
import { slugs } from "../../App";
import { updateUser, uploadImage } from "../../api/users";

export async function editAction({ request, params }: ActionFunctionArgs) {
	const formData = await request.formData();
	const updates = Object.fromEntries(formData);
	console.log(updates);
	if (updates.avatar) {
		const inputFile = document.getElementById("avatar");

		if (inputFile) {
			const uploadedImage = await uploadImage({
				alt_text: `${updates.first_name} ${updates.last_name}'s profile image`,
				// @ts-expect-error Todo: fix this
				file: inputFile?.files[0],
				title: `${updates.first_name} ${updates.last_name}`,
			});
			await updateUser(parseInt(params.id || "", 10), {
				...updates,
				simple_local_avatar: { media_id: uploadedImage.id },
			});
		}
	} else {
		await updateUser(parseInt(params.id || "", 10), updates);
	}
	return redirect(`/${slugs.user}/${params.id}`);
}

export default function EditContact() {
	const data: any = useLoaderData();

	return (
		<Form className="row g-3" method="post" id="data-form">
			<div className="col-md-6">
				<label htmlFor="first" className="form-label">
					First Name
				</label>
				<input
					className="form-control"
					defaultValue={data.first_name}
					name="first"
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
					defaultValue={data.last_name}
					name="last"
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
					defaultValue={data.url}
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
					defaultValue={data.description}
					name="description"
					rows={6}
					style={{ height: "calc(5 * 2.5rem" }}
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
	);
}
