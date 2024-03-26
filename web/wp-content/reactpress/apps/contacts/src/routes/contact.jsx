import { Form, useLoaderData } from "react-router-dom";
import { getContact } from "../api";
import reactPress from "../lib/reactpress";

export async function contactLoader({ params }) {
	const contact = await getContact(params.contactId)

	return contact
}

export default function Contact() {
	const contact = useLoaderData();

	console.log(contact);

	return (
		<div id="contact" className="d-flex">
			<div className="pe-4">
				<img
					alt={`${contact?.name} of avatar`}
					className="rounded"
					height={96}
					src={
						contact.simple_local_avatar?.full ||
						contact?.avatar_urls['96'] ||
						null
					}
					width={96}
				/>
			</div>
			<div>
				<h1 className="d-flex display-6 my-0">
					{contact.name ? (
						<>
							{contact.name}
						</>
					) : (
						<i>No Name</i>
					)}
				</h1>
				{contact.url && (
					<p className="fs-4 my-0">
						<a target="_blank" href={contact.url} rel="noreferrer">
							{contact.url}
						</a>
					</p>
				)}
				{contact.description && <p>{contact.description}</p>}

				{/* // Only show the edit and delete buttons if the user is an administrator or the contact is the current username */}
				{(reactPress?.user?.roles?.includes('administrator') ||
					reactPress?.user?.ID === contact?.id) && (
						<div className="d-flex">
							<Form action="edit">
								<button className="btn btn-outline-primary" type="submit">
									Edit
								</button>
							</Form>
							&nbsp;
							<Form
								method="post"
								action="destroy"
								onSubmit={(event) => {
									if (
										!window.confirm(
											'Please confirm you want to delete this record.'
										)
									) {
										event.preventDefault()
									}
								}}
							>
								<button className="btn btn-outline-danger" type="submit">
									Delete
								</button>
							</Form>
						</div>
					)}
			</div>
		</div>
	)
}
