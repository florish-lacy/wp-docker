/**
 * v0 by Vercel.
 * @see https://v0.dev/t/biNTgzf6r22
 * Documentation: https://v0.dev/docs#integrating-generated-code-into-your-nextjs-app
 */
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";

export default function VendorInformation() {
	return (
		<div className="mx-auto my-8 p-8">
			<h1 className="text-3xl font-bold mb-2">Business information</h1>
			<p className="mb-8">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit ......
			</p>
			<div className="mb-8">
				<h2 className="text-xl font-semibold mb-2">Add Business information</h2>
				<p className="mb-4">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit ......
				</p>
				<div className="grid grid-cols-2 gap-4">
					<Input placeholder="Account Owner Name" />
					<Input placeholder="Email Address" />
					<Input placeholder="Legal Business Name / Entity Name" />
					<Input placeholder="EIN" />
					<Input
						className="col-span-2"
						placeholder="Corporate Mailing Address"
					/>
				</div>
			</div>
			<div className="mb-8">
				<h2 className="text-xl font-semibold mb-2">Add Nursery Location</h2>
				<p className="mb-4">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit ......
				</p>
				<div className="grid grid-cols-2 gap-4">
					<Input placeholder="Location Name" />
					<Input placeholder="Location Address" />
					<Input placeholder="Location Delivery Radius" />
					<Input placeholder="Nursery Email Address" />
					<Input placeholder="Nursery Manager Full Name" />
					<Input placeholder="Nursery Manager Direct number?" />
				</div>
			</div>
			<div className="flex justify-between">
				<Button variant="outline">Back</Button>
				<Button>Save</Button>
			</div>
		</div>
	);
}
