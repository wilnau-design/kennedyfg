<?php
/**
 * Create the four Process child pages that use the Service Article template.
 *
 * @package kennedyfg
 */

$parent = get_page_by_path( 'process' );
if ( ! $parent ) {
	fwrite( STDERR, "Process page not found.\n" );
	exit( 1 );
}

$pages = array(
	array(
		'slug'     => 'map-your-retirement-income',
		'order'    => 1,
		'eyebrow'  => 'Map Your Retirement Income',
		'title'    => 'Turning “I Think I’m Ready” Into a Plan',
		'content'  => <<<'HTML'
<p>One of the most common questions we hear from people approaching retirement is, “Do I have enough to retire?” It’s an important question, but on its own, it’s usually not specific enough.</p>
<p>You might have a million dollars saved, maybe two. You know approximately what Social Security will pay. You might have a pension too. You’ve done a great job saving for decades. But none of those numbers by themselves tell you whether you’re ready to retire.</p>
<p>At Kennedy Financial Group, we believe a retirement plan should start with something much more specific: a <strong>date and dollar specific retirement plan</strong>. In other words, when do you want to retire? How much will you need to live the retirement you want? And exactly where will that income come from?</p>
<p>That’s what we mean by Map Your Retirement Income, the first phase of our <strong>Guided Retirement Roadmap</strong>.</p>
<h2>Start With the Life, Not the Portfolio</h2>
<p>It can be tempting to start retirement planning by looking at your investment accounts. How much have I saved? What return am I earning? How should my portfolio be invested?</p>
<p>Those questions matter, but we believe they come second. First, we need to understand what your money needs to do for you.</p>
<p>That begins with your spending. What does it take to maintain your lifestyle each month? What expenses might disappear in retirement? Which ones might increase?</p>
<p>Just as importantly, what do you want your money to do? Maybe your retirement means traveling several times a year. Maybe there’s a second home in the plan, a kitchen renovation, a new vehicle, helping kids or grandkids, or even a bucket-list purchase you’ve been putting off.</p>
<p>We’re not just trying to determine what it costs to survive retirement. We want to understand what it costs to live the retirement you actually want.</p>
<h2>Where Will Your Retirement Paycheck Come From?</h2>
<p>Once we understand what you want to spend, the next question is simple: Where’s the money coming from?</p>
<p>During your working years, that answer is usually straightforward. A paycheck arrives every couple of weeks. Retirement is different.</p>
<p>We often explain retirement income with a simple three-legged stool: <strong>Social Security, pension income, and portfolio withdrawals</strong>. Not everybody has all three, but the concept helps. We want to identify each source and understand how they work together.</p>
<p>For example, if your desired lifestyle requires $10,000 per month and Social Security and pension income provide $6,000, we now know that the portfolio has another job to do. It needs to help provide the remaining $4,000 per month.</p>
<p>That gap becomes incredibly important because it begins to tell us how much you need from your investments and, eventually, how those investments should be structured.</p>
<h2>Put a Date and a Dollar on It</h2>
<p>There’s a big difference between saying, “I’d like to retire around 65,” and saying, “I want to retire in June 2029, and our plan shows what we need each month, where that income will come from, and how we’ll fund the larger things we want to do.”</p>
<p>The second one creates clarity. It also gives us something we can actually plan around.</p>
<p>Retirement will always contain unknowns. Markets change, tax laws change, inflation changes what things cost, and life will undoubtedly throw a few curveballs along the way. The goal isn’t to predict all of that perfectly. The goal is to begin with a clear map.</p>
<p>Before we decide how aggressively or conservatively your money should be invested, before we look at tax strategies, before we address the other important pieces, we first want to know: <strong>What does your money need to do?</strong></p>
<p>That’s why Map Your Retirement Income is the starting point of our Guided Retirement Roadmap. Retirement shouldn’t begin with “I think I have enough.” It should begin with a plan for when you can retire, what it will cost, and where the money will come from.</p>
HTML,
	),
	array(
		'slug'    => 'align-your-investments',
		'order'   => 2,
		'eyebrow' => 'Align Your Investments',
		'title'   => 'Are Your Investments Aligned With Your Retirement Plan?',
		'content' => <<<'HTML'
<p>One of the first questions people ask about investing is, “How have you done?” Or maybe, “Am I making enough?” Or, “How does my portfolio compare?”</p>
<p>Those are reasonable questions, but as you approach retirement, we believe there’s a more important one: <strong>Are your investments aligned with your retirement plan?</strong></p>
<p>During your working years, the primary job may have been simple: save as much as you can and grow your money. Retirement changes that. Your investments may now need to provide monthly income, fund larger purchases, withstand difficult markets, and keep growing for 30 years or more.</p>
<p>That’s why <strong>Align Your Investments</strong> is the second phase of our Guided Retirement Roadmap.</p>
<h2>Assign a Name and Goal to Every Dollar</h2>
<p>Once we’ve mapped your retirement income and spending needs, we have a much better idea of what your investments actually need to do.</p>
<p>Instead of one generic portfolio, we think in terms of buckets of money with different jobs.</p>
<p>One is a growth bucket — money designed for the long term, helping your retirement income keep pace with the rising cost of living.</p>
<p>But not every dollar has decades to grow. If you know you’ll need money next year for a new vehicle, a home project, or simply monthly income, that dollar has a very different job.</p>
<h2>Finding the Right Balance</h2>
<p>We don’t want a retirement portfolio to be too aggressive or too conservative.</p>
<p>If money you need in six months is invested entirely for long-term growth, you could be forced to sell during a downturn. But moving everything into conservative investments creates a different risk: your money may not grow enough to support rising costs over a long retirement.</p>
<p>For many retirees, we like to start with a <strong>minimum of two years of needed portfolio withdrawals</strong> in a safe or income bucket, sometimes called a war chest. That gives you a source of funds for near-term spending without exposing every dollar to the same level of market risk.</p>
<h2>Don’t Turn a Temporary Decline Into a Permanent Loss</h2>
<p>Markets decline. That’s normal. The problem often isn’t that an investment goes down temporarily. It’s when you’re forced to sell while it’s down, either because of fear or simply because you need the money.</p>
<p>A properly funded war chest can help with that. If your near-term income needs are accounted for, you may have more freedom to give growth investments time to recover.</p>
<h2>Your Sleep-at-Night Factor Matters</h2>
<p>Two years is a starting point, not a rigid formula. Some people feel fine with that. Others may sleep much better with five or six years. If the overall plan supports it, that’s not necessarily wrong.</p>
<p>Our job is not simply to build a portfolio that works on paper. It’s to help create one you can actually live with through both good markets and bad.</p>
<p>That’s what it means to align your investments: not chasing the highest return, not avoiding risk at all costs, but giving your money clear jobs and finding the right balance to support your retirement journey.</p>
HTML,
	),
	array(
		'slug'    => 'manage-your-taxes',
		'order'   => 3,
		'eyebrow' => 'Manage Your Taxes',
		'title'   => 'Don’t Let Taxes Manage Your Retirement',
		'content' => <<<'HTML'
<p>You’ve built an income plan. Your investments are aligned with that plan. On paper, retirement may look pretty solid.</p>
<p>But there’s another part of the plan that’s easy to overlook: <strong>taxes</strong>.</p>
<p>At Kennedy Financial Group, <strong>Manage Your Taxes</strong> is the third phase of our Guided Retirement Roadmap, and it’s an area where we believe being proactive can make a meaningful difference.</p>
<p>Because when it comes to retirement taxes, the deck can sometimes feel stacked against you.</p>
<h2>Your IRA Has a Silent Partner</h2>
<p>Imagine you’re 60 years old with $1 million in a traditional IRA. It’s easy to look at that statement and think, “I have a million dollars for retirement.”</p>
<p>But that IRA has a silent partner: the IRS. That account may grow for decades, and as money comes out, those distributions will generally be taxable as income.</p>
<p>For some households, over a long retirement, that can add up to a very large tax bill — potentially hundreds of thousands of dollars, sometimes more. That’s not a prediction or a promise. It’s simply meant to highlight the scale of the issue.</p>
<h2>Tax Prep Isn’t Tax Planning</h2>
<p>Every year you file a tax return. That’s tax preparation. It’s important, but it’s mostly backward-looking.</p>
<p>Tax planning asks a different question: Given the plan we’ve built, are there moves we should at least evaluate now that could improve flexibility later?</p>
<p>For example, there may be years when your income is temporarily lower or years before required minimum distributions begin. Those years might present planning opportunities worth discussing.</p>
<h2>Things That Often Catch People Off Guard</h2>
<p>Required minimum distributions don’t ask whether you need the income. Medicare premiums through IRMAA can increase when income crosses certain thresholds. Tax rates and rules can change.</p>
<p>You don’t need to memorize all of that, but it’s part of why tax strategy isn’t just a one-time decision.</p>
<p>Depending on an individual’s circumstances, strategies worth evaluating may include Roth conversions, qualified charitable distributions, donor-advised funds, and other tax-aware planning techniques.</p>
<h2>Proactive, Not Predictive</h2>
<p>We don’t know future tax rates. We don’t know future laws. And we can’t guarantee outcomes.</p>
<p>What we can do is help you make informed decisions while options are still available and adjust when life or the rules change.</p>
<p>You’ve spent decades building your savings. Managing taxes is about being just as intentional about how that money comes out — building an income plan designed for tax-aware withdrawals, avoiding unnecessary surprises, and considering tax-smart strategies when they fit your plan.</p>
HTML,
	),
	array(
		'slug'    => 'safeguard-your-family',
		'order'   => 4,
		'eyebrow' => 'Safeguard Your Family',
		'title'   => 'Protecting What You’ve Built and What Comes Next',
		'content' => <<<'HTML'
<p>Many of the families we work with didn’t set out to be wealthy. They worked hard, lived below their means, saved consistently, and made thoughtful choices for decades.</p>
<p>Then one day, they realize, “We’ve accumulated a few million dollars. Now what?”</p>
<p>For some, they’re the first millionaires in their family, and the conversation shifts. It’s no longer just, “Do we have enough?” but, “What do we want this to mean?”</p>
<p><strong>Safeguard Your Family</strong> is the fourth and final phase of our Guided Retirement Roadmap. After mapping your retirement income, aligning your investments, and developing a proactive tax strategy, we plan for the plan: What happens if things don’t go exactly as expected? And ultimately, what happens to everything you’ve built when you’re no longer here?</p>
<h2>Protect the Life You’ve Built</h2>
<p>A good retirement plan needs to account for more than what we hope will happen.</p>
<p>Health events, long-term care needs, or the unexpected loss of a spouse can derail even a well-designed plan. That’s where insurance and risk management come in.</p>
<p>The goal isn’t to own more insurance. It’s to understand which risks you want to carry yourself and which risks may make sense to transfer, so that if the big stuff happens, it doesn’t unnecessarily derail the lifestyle and legacy you’ve planned.</p>
<h2>Make Sure Your Wishes Become the Plan</h2>
<p>Most people have a general idea of what they want to happen, but intentions aren’t an estate plan.</p>
<p>A thoughtful, up-to-date estate plan provides clarity around how assets should pass and who should make important decisions. The documents matter, but the heart of the process is making sure the plan reflects what you actually want.</p>
<p>Families change. Assets change. Your estate plan needs to keep up.</p>
<h2>You May Have the Opportunity to Change Your Family Tree</h2>
<p>For someone who is first in their family to accumulate significant wealth, this can mean much more than leaving behind an account balance.</p>
<p>It can mean helping children or grandchildren with education, a first home, or opportunities that previous generations may not have had. But passing wealth successfully takes thought.</p>
<p>How much is enough? When should they receive it? What values do you hope go with it? Those are family questions, not just investment questions.</p>
<h2>Don’t Wait Until You’re Gone to Create Your Legacy</h2>
<p>Legacy planning doesn’t have to begin at the end.</p>
<p>Sometimes the most meaningful use of wealth is getting to experience its impact yourself. Maybe that’s helping a child with a first home, taking the family on a trip they’ll remember for decades, or giving with a warm hand to a charity or cause that matters deeply to you.</p>
<p>You’ve spent decades building this wealth. Part of the planning process is giving yourself permission to use it intentionally — not just someday, but today.</p>
<h2>More Than the Money</h2>
<p>Eventually, every plan reaches a point where the numbers aren’t the most important part.</p>
<p>What do you want your family to remember? What opportunities do you want to create? What causes do you want to support? What values do you want carried forward?</p>
<p>Safeguarding your family means protecting against the things that could derail your plan, having an estate plan that clearly communicates your wishes, and being intentional about the legacy you want to create.</p>
<p>Because the goal isn’t simply to leave money behind. It’s to make sure what you’ve built continues to make an impact on your family, the causes you care about, and potentially generations you may never meet.</p>
HTML,
	),
);

foreach ( $pages as $page ) {
	$existing = get_page_by_path( 'process/' . $page['slug'] );
	$postarr  = array(
		'post_type'     => 'page',
		'post_status'   => 'publish',
		'post_parent'   => (int) $parent->ID,
		'post_name'     => $page['slug'],
		'post_title'    => $page['title'],
		'post_content'  => $page['content'],
		'menu_order'    => $page['order'],
		'page_template' => 'page-service.php',
	);

	if ( $existing ) {
		$postarr['ID'] = (int) $existing->ID;
		$id            = wp_update_post( wp_slash( $postarr ), true );
	} else {
		$id = wp_insert_post( wp_slash( $postarr ), true );
	}

	if ( is_wp_error( $id ) ) {
		fwrite( STDERR, $page['slug'] . ': ' . $id->get_error_message() . "\n" );
		continue;
	}

	update_post_meta( $id, '_wp_page_template', 'page-service.php' );
	update_post_meta( $id, 'service_eyebrow', $page['eyebrow'] );
	echo $page['slug'] . ' => ' . get_permalink( $id ) . "\n";
}
