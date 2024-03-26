// https://rockiger.com/en/reactpress/reactpress-tutorial
import React from 'react'
import ReactDOM from 'react-dom/client'
import { RouterProvider, createHashRouter } from 'react-router-dom'
import Root, { rootAction, rootLoader } from './routes/root'

import ErrorPage from './errorPage'
import './index.css'
import Index from './routes'
import Contact, { contactLoader } from './routes/contact'
import { destroyAction } from './routes/destroy'
import EditContact, { editAction } from './routes/edit'
import NewContact, { newAction } from './routes/new'
const router = createHashRouter([
	{
		path: '/',
		element: <Root />, errorElement: <ErrorPage />,
		loader: rootLoader,
		action: rootAction,
		children: [
			{
				errorElement: <ErrorPage />,
				children: [
					{ index: true, element: <Index /> },

					{
						path: "contacts/:contactId",
						element: <Contact />,
						loader: contactLoader,
					},
					{
						path: "contacts/:contactId/edit",
						element: <EditContact />,
						loader: contactLoader,
						action: editAction
					},
					{ path: 'contacts/new', element: <NewContact />, action: newAction },
					{
						path: "contacts/:contactId/destroy",
						action: destroyAction,
						errorElement: <div>Oops! There was an error.</div>,
					},
				],
			},
		],
	},

])

const root = ReactDOM.createRoot(document.getElementById('root'))
root.render(
	<React.StrictMode>
		<RouterProvider router={router} />
	</React.StrictMode>
)
