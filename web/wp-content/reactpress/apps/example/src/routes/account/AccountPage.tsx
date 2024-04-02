import { Terminal } from "lucide-react";
import { useRouteLoaderData } from "react-router-dom";

import { Alert, AlertDescription, AlertTitle } from "@/components/ui/alert";
import { VendorAccount } from "../signup/VendorAccount";

export default function AccountPage() {
	const { user, isAdmin, isVendor } = useRouteLoaderData("root");

	return (
		<>
			{isAdmin && (
				<Alert variant={"destructive"}>
					<Terminal className="h-4 w-4" />
					<AlertTitle>Logged in as an Administrator</AlertTitle>
					<AlertDescription>
						Be careful with the changes you make.
					</AlertDescription>
				</Alert>
			)}

			{isVendor && <VendorAccount />}

			{JSON.stringify(user, null, 2)}
		</>
	);
}
