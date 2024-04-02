/* global reactPress */

import WPAPI from 'wpapi';
import reactPress from '../lib/reactpress';

const wp = new WPAPI(
	process.env.NODE_ENV === 'development'
		? {
			endpoint: reactPress.api.rest_url,
			username: 'veronicasykes',
			password: 'hSfY 8wuY VH2u z13n piqb Fa7t',
		}
		: { endpoint: reactPress.api.rest_url, nonce: reactPress.api.nonce }
)

export async function getUsers(q = '') {
	try {
		const users = await wp.users().search(q)
		return users.filter(user => user.id !== 1) // we don't want the admin user
	} catch (error) {
		console.error(error)
		return []
	}
}

export async function createUser(user) {
	const result = await wp.users().create(user)
	return result
}

export async function getUserById(id) {
	try {
		const user = wp.users().id(id).param('context', 'edit')
		return user
	} catch (error) {
		console.error(error)
		return {}
	}
}

export async function getCurrentUser() {
	try {
		const user = await wp.users().me().param('context', 'edit')
		return user
	} catch (error) {
		console.error(error)
		return {}
	}
}
