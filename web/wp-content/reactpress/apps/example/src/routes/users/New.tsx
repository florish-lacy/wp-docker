import { Button } from "@/components/ui/button";
import {
	Card,
	CardContent,
	CardDescription,
	CardHeader,
	CardTitle,
} from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Form } from "react-router-dom";
export default function NewUser() {
	return (
		<Form method="post">
			<h1>New User</h1>
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
							htmlFor="username"
						>
							Username
						</label>
						<Input
							defaultValue="JohnDoe"
							id="username"
							name="username"
							placeholder="Username"
						/>
					</div>
					<div className="grid grid-cols-[100px_1fr] items-center">
						<label
							className="text-sm font-medium peer-disabled:cursor-not-allowed"
							htmlFor="name"
						>
							Name
						</label>
						<Input
							defaultValue="John Doe"
							id="name"
							name="name"
							placeholder="Name"
						/>
					</div>
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
						<label
							className="text-sm font-medium peer-disabled:cursor-not-allowed"
							htmlFor="phone"
						>
							Phone
						</label>
						<Input
							defaultValue="+1 (123) 456-7890"
							id="phone"
							name="phone"
							placeholder="Phone"
						/>
					</div>
				</CardContent>
			</Card>
			<Button className="mt-4" type="submit">
				Save
			</Button>
		</Form>
	);
}
