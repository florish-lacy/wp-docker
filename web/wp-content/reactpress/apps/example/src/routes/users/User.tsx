import { Form, useLoaderData } from "react-router-dom";

export default function User() {
	const { user: data }: any = useLoaderData();

	return (
		<div id="contact" className="d-flex">
			<div className="pe-4">
				<img
					alt={`${data?.name} of avatar`}
					className="rounded"
					height={96}
					src={data.simple_local_avatar?.full || ""}
					width={96}
				/>
			</div>
			<div>
				<h1 className="d-flex display-6 my-0">
					{data.name ? <>{data.name}</> : <i>No Name</i>}
				</h1>
				{data.url && (
					<p className="fs-4 my-0">
						<a target="_blank" href={data.url} rel="noreferrer">
							{data.url}
						</a>
					</p>
				)}
				{data.description && <p>{data.description}</p>}
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
									"Please confirm you want to delete this record."
								)
							) {
								event.preventDefault();
							}
						}}
					>
						<button className="btn btn-outline-danger" type="submit">
							Delete
						</button>
					</Form>
				</div>
			</div>
		</div>
	);
}
