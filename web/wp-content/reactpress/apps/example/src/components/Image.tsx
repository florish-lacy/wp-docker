import dynamic from "next/dynamic";

declare global {
	interface Window {
		next?: {
			version: string;
		};
	}
}

type ImageProps = {
	src: string;
	alt: string;
	width: number | string;
	height: number | string;
	[prop: string]: any;
};

const Image = ({ src, alt, width, height, ...props }: ImageProps) => {
	const isNextEnv = typeof window !== "undefined" && window?.next?.version;

	if (!isNextEnv) {
		const NextImage = dynamic(() => import("next/image"));

		return (
			<NextImage
				src={src}
				alt={alt}
				// Next Image can accept a string or number for width and height
				width={width as number}
				height={height as number}
				{...props}
			/>
		);
	}
	return <img src={src} alt={alt} width={width} height={height} {...props} />;
};

export default Image;
