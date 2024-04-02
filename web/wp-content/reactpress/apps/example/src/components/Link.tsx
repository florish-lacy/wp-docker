// detect if running in a Next.js environment or a React Router environment
// and use the appropriate link component, remembering to pass props correctly
// next/link uses `href`, react-router-dom uses `to`
import dynamic from "next/dynamic";
import { Link as ReactRouterLink } from "react-router-dom";

declare global {
	interface Window {
		next?: {
			version: string;
		};
	}
}

type LinkProps = {
	href?: string;
	[prop: string]: any;
};

const Link = ({ href = "", ...props }: LinkProps) => {
	const isNextEnv = typeof window !== "undefined" && window?.next?.version;

	if (isNextEnv) {
		// next/link uses node process, so load it dynamically
		const NextLink = dynamic(() => import("next/link"));
		return <NextLink href={href} {...props} />;
	}

	return <ReactRouterLink to={href} {...props} />;
};

export default Link;
