import { useRouteError } from "react-router-dom";

interface ErrorProp {
	statusText?: string;
	message?: string;
}

export default function ErrorPage() {
	const error: ErrorProp = useRouteError() as ErrorProp;
	console.error(error);

	return (
		<div
			className="align-items-center bg-white d-flex flex-column flex-grow-1 justify-content-center"
			id="error-page"
		>
			<h1 className="mt-0">Oops!</h1>
			<p>Sorry, an unexpected error has occurred.</p>
			<p>
				<i>{error.statusText || error.message}</i>
			</p>
		</div>
	);
}
