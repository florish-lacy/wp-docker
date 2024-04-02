import { LoginCard } from "./LoginCard";
import LoginCard2 from "./LoginCard2";

export function Login() {
	return (
		<div className="w-full lg:grid lg:min-h-[600px] lg:grid-cols-2 xl:min-h-[800px]">
			<div className="flex items-center justify-center py-12">
				<LoginCard />
			</div>
			<div className="flex items-center justify-center py-12 bg-muted">
				<LoginCard2 />
			</div>
		</div>
	);
}
