import { Button } from "@/components/ui/button";
import {
	Card,
	CardContent,
	CardDescription,
	CardHeader,
	CardTitle,
} from "@/components/ui/card";
import { Checkbox } from "@/components/ui/checkbox";
import { Input } from "@/components/ui/input";
import { Form, useRouteLoaderData } from "react-router-dom";
export default function CreateUserForm() {
	const { isAdmin } = useRouteLoaderData("root");
	return (
		<Form method="post">
			<h1>Sign up to start using Florish</h1>
			<Card className="w-full md:max-w-3xl">
				<CardHeader>
					<CardTitle>Profile Information</CardTitle>
					<CardDescription>
						Your personal information is never shared with anyone.
					</CardDescription>
				</CardHeader>
				<CardContent className="grid gap-4">
					<div className="grid grid-cols-[100px_1fr] items-center">
						<label
							className="text-sm font-medium peer-disabled:cursor-not-allowed"
							htmlFor="email"
						>
							Email
						</label>
						<Input
							defaultValue="john@example.com"
							id="email"
							name="email"
							placeholder="Email"
							type="email"
						/>
					</div>
					<div className="grid grid-cols-[100px_1fr] items-center">
						<label
							className="text-sm font-medium peer-disabled:cursor-not-allowed"
							htmlFor="password"
						>
							Password
						</label>
						<Input
							defaultValue=""
							id="password"
							name="password"
							placeholder="Something clever..."
						/>
					</div>
					<div className="grid grid-cols-[100px_1fr] items-center">
						<Checkbox id="is-vendor" name="is-vendor" />
						<label
							htmlFor="is-vendor"
							className="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
						>
							Sign up as a vendor
						</label>
					</div>
				</CardContent>
			</Card>
			<Button
				className="mt-4"
				type="submit"
				name="createdByAdmin"
				value={isAdmin}
			>
				Save
			</Button>
		</Form>
	);
}
