/**
 * Block: Summary & Details
 * @see https://css-tricks.com/quick-reminder-that-details-summary-is-the-easiest-way-ever-to-make-an-accordion/
 */

import { map } from 'lodash';

import './editor.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;
const toRichTextValue = value => map( value, subValue => subValue.children );
const fromRichTextValue = value =>
	map( value, subValue => ( {
		children: subValue,
	} ) );

registerBlockType( 'bight/summary-and-details', {
	title: __( 'Summary & Details' ),
	icon: 'excerpt-view',
	category: 'common',
	keywords: [ __( 'details' ), __( 'summary' ) ],
	attributes: {
		details: {
			type: 'array',
			source: 'query',
			selector: 'details > p',
			query: {
				children: {
					source: 'node',
				},
			},
		},
		summary: {
			type: 'array',
			source: 'children',
			selector: 'summary',
		},
	},

	edit: function( props ) {
		const { details, summary } = props.attributes;

		function onChangeSummary( newSummary ) {
			props.setAttributes( { summary: newSummary } );
		}

		function onChangeDetails( newDetails ) {
			props.setAttributes( { details: fromRichTextValue( newDetails ) } );
		}

		return (
			<div className={ props.className }>
				<RichText
					placeholder={ __( 'Details' ) }
					tagName="p"
					className="summary"
					value={ summary }
					onChange={ onChangeSummary }
				/>

				<RichText
					className="details"
					multiline="p"
					value={ toRichTextValue( details ) }
					onChange={ onChangeDetails }
					placeholder={ __( 'Detail text goes here.' ) }
				/>
			</div>
		);
	},

	save: function( props ) {
		const { details, summary } = props.attributes;

		return (
			<details className={ props.className }>
				{ summary && summary.length > 0 && <summary>{ summary }</summary> }
				{ details &&
					details.map( ( paragraph, i ) => (
						<p key={ i }>
							{ paragraph.children && paragraph.children.props.children }
						</p>
					) ) }
			</details>
		);
	},
} );
