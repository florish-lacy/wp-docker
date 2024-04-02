"use client";

import { zodResolver } from "@hookform/resolvers/zod";
import { useSearchParams } from "next/navigation";
import * as React from "react";

import { useForm } from "react-hook-form";
import * as z from "zod";

import { Button, buttonVariants } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { cn } from "@/lib/utils";

import { userAuthSchema } from "@/validations/auth";
import { toast } from "sonner";
import { Icons } from "../Icons";
import Link from "../Link";

interface UserAuthFormProps extends React.HTMLAttributes<HTMLDivElement> {}

type FormData = z.infer<typeof userAuthSchema>;

export function UserAuthForm({ className, ...props }: UserAuthFormProps) {
	const {
		register,
		handleSubmit,
		formState: { errors },
	} = useForm<FormData>({
		resolver: zodResolver(userAuthSchema),
	});
	const [isLoading, setIsLoading] = React.useState<boolean>(false);
	const [isGitHubLoading, setIsGitHubLoading] = React.useState<boolean>(false);
	const searchParams = useSearchParams();

	async function onSubmit(data: FormData) {
		setIsLoading(true);

		const signInResult = false;

		setIsLoading(false);

		if (!signInResult?.ok) {
			return toast.error("Something went wrong.", {
				description: "Your sign in request failed. Please try again.",
			});
		}

		return toast("Check your email", {
			description: "We sent you a login link. Be sure to check your spam too.",
		});
	}

	return (
		<div className={cn("grid gap-4", className)} {...props}>
			<form onSubmit={handleSubmit(onSubmit)}>
				<div className="grid gap-4">
					<div className="grid gap-1">
						<Label htmlFor="email">Email</Label>
						<Input
							id="email"
							placeholder="name@example.com"
							type="email"
							autoCapitalize="none"
							autoComplete="email"
							autoCorrect="off"
							disabled={isLoading || isGitHubLoading}
							{...register("email")}
						/>
						{errors?.email && (
							<p className="px-1 text-xs text-red-600">
								{errors.email.message}
							</p>
						)}
					</div>
					<div className="grid gap-1">
						<div className="flex items-center">
							<Label htmlFor="password">Password</Label>
							<Link href="#" className="ml-auto inline-block text-sm underline">
								Forgot your password?
							</Link>
						</div>
						<Input
							id="password"
							placeholder="Choose a password"
							type="password"
							autoCapitalize="none"
							autoComplete="password"
							disabled={isLoading || isGitHubLoading}
							{...register("password")}
						/>
						{errors?.password && (
							<p className="px-1 text-xs text-red-600">
								{errors.password.message}
							</p>
						)}
					</div>
					<button className={cn(buttonVariants())} disabled={isLoading}>
						{isLoading && (
							<Icons.spinner className="mr-2 h-4 w-4 animate-spin" />
						)}
						Sign In with Email
					</button>
				</div>
			</form>
			<div className="relative">
				<div className="absolute inset-0 flex items-center">
					<span className="w-full border-t" />
				</div>
				<div className="relative flex justify-center text-xs uppercase">
					<span className="bg-background px-2 text-muted-foreground">
						Or continue with
					</span>
				</div>
			</div>
			<Button
				type="button"
				variant="outline"
				onClick={() => {
					setIsGitHubLoading(true);
					// signIn("github");
				}}
				disabled={isLoading || isGitHubLoading}
			>
				{isGitHubLoading ? (
					<Icons.spinner className="mr-2 h-4 w-4 animate-spin" />
				) : (
					<Icons.gitHub className="mr-2 h-4 w-4" />
				)}{" "}
				Github
			</Button>
			<Button variant="outline">Login with Google</Button>
		</div>
	);
}
