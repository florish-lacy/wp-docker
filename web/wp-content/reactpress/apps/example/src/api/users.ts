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

export async function getContacts(q = '') {
	try {
		const users = await wp.users().search(q)
		return users.filter(user => user.id !== 1) // we don't want the admin user
	} catch (error) {
		console.error(error)
		return []
	}
}

export async function createContact(user) {
	try {
		const result = await wp.users().create(user)
		return result
	} catch (error) {
		// Todo: handle errors
		console.warn(error)
	}
}

export async function getContact(id) {
	try {
		const user = wp.users().id(id).param('context', 'edit')
		return user
	} catch (error) {
		console.error(error)
		return {}
	}
}

export async function updateContact(id, user) {
	try {
		const result = wp.users().id(id).update(
			user.media_id
				? { ...user, simple_local_avatar: { media_id: user.media_id } }
				: user
		)
		return result
	} catch (error) {
		console.error(error)
	}
}

export async function uploadImage({ file, title, alt_text }) {
	try {
		const result = await wp.media().file(file).create({
			title,
			alt_text,
		})
		return result
	} catch (error) {
		console.error(error)
	}
}


export async function deleteContact(id) {
	try {
		const result = await wp.users().id(id).delete({ force: true, reassign: 0 })
		return result
	} catch (error) {
		console.error(error)
	}
}
