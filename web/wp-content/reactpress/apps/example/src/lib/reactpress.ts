declare global {
	interface Window {
		reactPress: any; // Consider using a more specific type instead of any if possible
	}
}

const reactPress = window.reactPress
// uncomment next line if you want the user to have admin rights
// reactPress.user.roles.push('administrator')

export default reactPress
