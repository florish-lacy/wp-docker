"use client";

import { zodResolver } from "@hookform/resolvers/zod";
import * as React from "react";

import { useForm } from "react-hook-form";
import * as z from "zod";

import { Button, buttonVariants } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { cn } from "@/lib/utils";

import { userAuthSchema } from "@/validations/auth";
import { useNavigation, useSubmit } from "react-router-dom";
import { Icons } from "../Icons";
import { Checkbox } from "../ui/checkbox";

interface UserSignupFormProps extends React.HTMLAttributes<HTMLDivElement> {}

type FormData = z.infer<typeof userAuthSchema>;

export function UserSignupForm({ className, ...props }: UserSignupFormProps) {
	const {
		trigger,
		register,
		getValues,
		formState: { errors },
	} = useForm<FormData>({
		resolver: zodResolver(userAuthSchema),
	});
	const [isGitHubLoading, setIsGitHubLoading] = React.useState<boolean>(false);
	const [isGoogleLoading, setIsGoogleLoading] = React.useState<boolean>(false);

	const submit = useSubmit();

	const navigation = useNavigation();
	const isSubmitting = navigation.state === "submitting";

	// async function onSubmit(data: FormData) {
	// 	setIsLoading(true);

	// 	const signInResult = submit(data);

	// 	console.log(signInResult);

	// 	setIsLoading(false);

	// 	if (!signInResult?.ok) {
	// 		return toast.error("Something went wrong.", {
	// 			description: "Your sign in request failed. Please try again.",
	// 		});
	// 	}

	// 	return toast("Check your email", {
	// 		description: "We sent you a login link. Be sure to check your spam too.",
	// 	});
	// }

	const onSubmit = async (e: React.FormEvent) => {
		const isValid = await trigger();
		e.preventDefault();
		if (isValid) {
			const values = getValues(); // `getValues`  from `useForm`
			submit(values, {
				method: "post",
			});
		}
	};

	return (
		<div className={cn("grid gap-4", className)} {...props}>
			<form onSubmit={onSubmit}>
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
							disabled={isSubmitting || isGitHubLoading || isGoogleLoading}
							value={"asd@gmail.com"}
							{...register("email")}
						/>
						{errors?.email && (
							<p className="px-1 text-xs text-red-600">
								{errors.email.message}
							</p>
						)}
					</div>
					<div className="grid gap-1">
						<Label htmlFor="password">Password</Label>
						<Input
							id="password"
							placeholder="Choose a password"
							type="password"
							autoCapitalize="none"
							autoComplete="password"
							disabled={isSubmitting || isGitHubLoading || isGoogleLoading}
							{...register("password")}
						/>
						{errors?.password && (
							<p className="px-1 text-xs text-red-600">
								{errors.password.message}
							</p>
						)}
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
					<button className={cn(buttonVariants())} disabled={isSubmitting}>
						{isSubmitting && (
							<Icons.spinner className="mr-2 h-4 w-4 animate-spin" />
						)}
						Sign up
					</button>
				</div>
			</form>
			<div className="relative">
				<div className="absolute inset-0 flex items-center">
					<span className="w-full border-t" />
				</div>
				<div className="relative flex justify-center text-xs uppercase">
					<span className="bg-background px-2 text-muted-foreground">
						Or sign up with
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
				disabled={isSubmitting || isGitHubLoading}
			>
				{isGitHubLoading ? (
					<Icons.spinner className="mr-2 h-4 w-4 animate-spin" />
				) : (
					<Icons.gitHub className="mr-2 h-4 w-4" />
				)}{" "}
				Github
			</Button>
			<Button
				type="button"
				variant="outline"
				onClick={() => {
					setIsGoogleLoading(true);
					// signIn("google");
				}}
				disabled={isSubmitting || isGoogleLoading}
			>
				{isGoogleLoading ? (
					<Icons.spinner className="mr-2 h-4 w-4 animate-spin" />
				) : (
					<Icons.gitHub className="mr-2 h-4 w-4" />
				)}{" "}
				Google
			</Button>
		</div>
	);
}
