import { slugs } from "@/config/slugs";
import { useEffect } from "react";
import {
	Form,
	NavLink,
	Outlet,
	useLoaderData,
	useNavigation,
	useSubmit,
} from "react-router-dom";

export default function Root() {
	const { isAdmin, users, q, ...data } = useLoaderData();
	const navigation = useNavigation();
	const submit = useSubmit();

	const searching =
		navigation.location &&
		new URLSearchParams(navigation.location.search).has("q");

	useEffect(() => {
		document.getElementById("q").value = q;
	}, [q]);
	return (
		<>
			<div id="sidebar">
				<h1>
					Address Book
					<div
						className={`spinner-border spinner-border-sm ms-auto ${
							navigation.state === "loading" ? "visible" : "invisible"
						} `}
						role="status"
					>
						<span className="">Loading...</span>
					</div>
				</h1>
				<div>
					<Form className="d-flex search-form" id="search-form" role="search">
						<i className="fa fa-search" aria-hidden="true"></i>
						<input
							id="q"
							aria-label="Search users"
							placeholder="Search"
							type="search"
							name="q"
							defaultValue={q}
							onChange={(event) => {
								const isFirstSearch = q == null;
								submit(event.currentTarget.form, {
									replace: !isFirstSearch,
								});
							}}
						/>
						<div className="sr-only" aria-live="polite"></div>
					</Form>
					{searching && <p>Searching...</p>}
					{isAdmin && (
						<Form method="post">
							<button className="btn hopeui_style-button" type="submit">
								New
							</button>
						</Form>
					)}
				</div>
				<nav>
					{users.length ? (
						<ul className="nav nav-pills nav-fill flex">
							{users.map((contact) => (
								<li key={contact.id} className="nav-item text-start">
									<NavLink
										className={({ isActive, isPending }) =>
											`nav-link ${
												isActive ? "active" : isPending ? "bg-secondary" : ""
											}`
										}
										to={`${slugs.user}/${contact.id}`}
									>
										{contact.name ? <>{contact.name}</> : <i>No Name</i>}{" "}
										{contact.favorite && <span>★</span>}
									</NavLink>
								</li>
							))}
						</ul>
					) : (
						<p>
							<i>No users</i>
						</p>
					)}
				</nav>
			</div>
			<div id="detail">
				<Outlet />
			</div>
		</>
	);
}
