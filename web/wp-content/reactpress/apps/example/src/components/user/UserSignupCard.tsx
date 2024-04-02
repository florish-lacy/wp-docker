import {
	Card,
	CardContent,
	CardDescription,
	CardHeader,
	CardTitle,
} from "@/components/ui/card";
import { UserSignupForm } from "./UserSignupForm";

export function UserSignupCard() {
	return (
		<Card className="mx-auto max-w-sm">
			<CardHeader>
				<CardTitle className="text-2xl">Create account</CardTitle>
				<CardDescription>
					Enter your email below to create an account
				</CardDescription>
			</CardHeader>
			<CardContent>
				<UserSignupForm />
			</CardContent>
		</Card>
	);
}
