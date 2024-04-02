import {
	Card,
	CardContent,
	CardDescription,
	CardHeader,
	CardTitle,
} from "@/components/ui/card";
import Link from "../Link";
import { UserAuthForm } from "./UserAuthForm";

export function LoginCard() {
	return (
		<Card className="mx-auto max-w-sm">
			<CardHeader>
				<CardTitle className="text-2xl">Login</CardTitle>
				<CardDescription>
					Enter your email below to login to your account
				</CardDescription>
			</CardHeader>
			<CardContent>
				<UserAuthForm />
				<div className="mt-4 text-center text-sm">
					Don&apos;t have an account?{" "}
					<Link href="#" className="underline">
						Sign up
					</Link>
				</div>
			</CardContent>
		</Card>
	);
}
