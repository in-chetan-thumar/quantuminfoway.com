<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Email signatures | Quantum Infoway</title>
<style>
*{box-sizing:border-box}body{margin:0;background:#0b0e1e;color:#edf0ff;font:16px/1.5 Arial,sans-serif}main{max-width:1160px;margin:auto;padding:48px 24px}a{color:inherit}.eyebrow{color:#a9b8ff;font-size:13px;letter-spacing:2px;text-transform:uppercase}h1{font-size:clamp(30px,5vw,48px);margin:12px 0}p{color:#b7bfd5}.settings{display:grid;grid-template-columns:repeat(2,1fr);gap:16px;padding:24px;background:#161b31;border:1px solid #303951;border-radius:16px;margin:28px 0}label{display:grid;gap:6px;font-size:14px}input{width:100%;padding:12px;border:1px solid #48516c;border-radius:8px;background:#0d1326;color:white;font:inherit}h2{margin:32px 0 6px}.variants{display:grid;grid-template-columns:1fr 1fr;gap:20px}.card{min-width:0;border:1px solid #303951;border-radius:14px;overflow:hidden}.bar{padding:14px 18px;display:flex;align-items:center;justify-content:space-between;gap:12px;background:#161b31}.bar h3{font-size:15px;margin:0}.preview{background:white;padding:28px 22px;min-height:230px;overflow:auto;color:#17213a}.reply .preview{min-height:160px}button{background:#6754ee;color:white;border:0;padding:9px 14px;border-radius:7px;font:inherit;font-size:13px;cursor:pointer}button:hover{background:#7969f9}button:focus-visible,input:focus-visible{outline:3px solid #b6c8ff;outline-offset:3px}.help{font-size:14px;max-width:800px}#status{position:sticky;bottom:16px;background:#202d4a;padding:12px 18px;border-radius:8px;min-height:48px;margin-top:24px} @media(max-width:760px){.settings,.variants{grid-template-columns:1fr}main{padding:28px 16px}.preview{padding:20px 14px}}
</style>
</head>
<body><main>
<a href="/">← Quantum Infoway</a>
<div class="eyebrow" style="margin-top:32px">Email essentials</div>
<h1>A signature for every conversation.</h1>
<p>Choose from five styles, including three logo-based options, with a full signature for new emails and a shorter one for replies.</p>
<section class="settings" aria-label="Your details">
<label>Name<input id="person" value="Chetan Thumar" placeholder="Your name" autocomplete="name"></label>
<label>Role<input id="role" value="Founder &amp; Technology Director" placeholder="Your role" autocomplete="organization-title"></label>
<label>Email<input id="email" type="email" value="hello@quantuminfoway.com" autocomplete="email"></label>
<label>Phone<input id="phone" type="tel" value="+91 85111 08041" autocomplete="tel"></label>
</section>
<p class="help">Enter your details, then use <strong>Copy signature</strong> and paste into your email app’s signature settings. Assign the full version to new messages and the compact version to replies and forwards. Details stay in this page and are not saved. Preview your signature in a test email; email apps may adjust formatting.</p>
<div id="styles"></div>
<div id="status" role="status" aria-live="polite">Choose a signature below to copy.</div>
</main>
<script>
const fields = ['person','role','email','phone'];
const escapeHtml = value => value.replace(/[&<>"']/g, char => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[char]));
function signature(style, reply){
 const person=escapeHtml(document.getElementById('person').value.trim()||'Your name');
 const role=escapeHtml(document.getElementById('role').value.trim()||'Your role');
 const email=document.getElementById('email').value.trim();
 const phone=document.getElementById('phone').value.trim();
 const contact=[email ? `<a href="mailto:${escapeHtml(encodeURIComponent(email))}" style="color:#354c93;text-decoration:none">${escapeHtml(email)}</a>` : '', phone ? `<a href="tel:${escapeHtml(phone.replace(/[^+0-9]/g,''))}" style="color:#354c93;text-decoration:none">${escapeHtml(phone)}</a>` : ''].filter(Boolean).join(reply?' &nbsp;|&nbsp; ':'<br>');
 const site='<a href="https://quantuminfoway.com/" style="color:#5444c8;text-decoration:none">quantuminfoway.com</a>';
 const identity=`<strong style="font-size:${reply?15:18}px;color:#17213a">${person}</strong><br><span style="color:#657087">${role} · Quantum Infoway</span>`;
 const brand='<strong style="font-size:17px;color:#17213a">Quantum <span style="color:#6352d9">Infoway</span></strong>';
 const logo=(dark,width)=>`<a href="https://quantuminfoway.com/" style="text-decoration:none"><img src="https://quantuminfoway.com/assets/images/brand/logo-email${dark?'-dark':''}.png" alt="Quantum Infoway" width="${width}" height="${width/5}" border="0" style="display:block;width:${width}px;height:${width/5}px;border:0"></a>`;
 if(style===6 && reply) return `<table role="presentation" cellpadding="0" cellspacing="0" border="0" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.5;color:#17213a;background-color:#ffffff"><tbody><tr><td colspan="2" style="padding-bottom:6px">Best regards,</td></tr><tr><td valign="top" width="42" style="padding-right:10px"><a href="https://quantuminfoway.com/" style="text-decoration:none"><img src="https://quantuminfoway.com/assets/images/brand/logo-email-mark.png" alt="Quantum Infoway" width="32" height="32" border="0" style="display:block;width:32px;height:32px;border:0"></a></td><td valign="top"><strong style="font-size:15px;color:#17213a">${person}</strong><br><span style="color:#657087">${role}</span>${contact?'<br>'+contact.replace(' &nbsp;|&nbsp; ','<br>'):''}</td></tr></tbody></table>`;
 let body='';
 if(style===0) body=`<tr><td style="border-left:3px solid #6754ee;padding-left:16px">${identity}<br><br>${contact}${contact?'<br>':''}${site}${reply?'':'<br><span style="color:#657087">Technology That Powers Business Growth</span>'}</td></tr>`;
 if(style===1) body=reply?`<tr><td>${identity}<br>${contact}${contact?'<br>':''}${site}</td></tr>`:`<tr><td style="padding-bottom:14px;border-bottom:2px solid #6754ee">${brand}<br><span style="color:#657087">Technology That Powers Business Growth</span></td></tr><tr><td style="padding-top:14px">${identity}<br><br>${contact}${contact?'<br>':''}${site}</td></tr>`;
 if(style===3) body=`<tr><td style="padding-bottom:${reply?10:16}px">${logo(false,reply?200:260)}</td></tr><tr><td style="border-top:2px solid #7050ff;padding-top:12px">${identity}<br>${contact}${contact?'<br>':''}${site}${reply?'':'<br><span style="color:#657087">Technology That Powers Business Growth</span>'}</td></tr>`;
 if(style===5) body=`<tr><td><table role="presentation" cellpadding="0" cellspacing="0" border="0" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.5"><tr><td valign="top" width="60" style="padding-right:12px"><a href="https://quantuminfoway.com/"><img src="https://quantuminfoway.com/assets/images/brand/logo-email-mark.png" alt="Quantum Infoway" width="48" height="48" border="0" style="display:block;width:48px;height:48px;border:0"></a></td><td valign="top"><strong style="font-size:20px;color:#17213a">${person}</strong><br><span style="color:#657087">${role}</span><br><strong style="color:#6352d9">Quantum Infoway</strong><br>${contact.replace(' &nbsp;|&nbsp; ','<br>')}${contact?'<br>':''}${site}${reply?'':'<br><span style="font-size:12px;color:#657087">Technology That Powers Business Growth</span>'}</td></tr></table></td></tr>`;
 if(style===6) body=`<tr><td><table role="presentation" cellpadding="0" cellspacing="0" border="0" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.5"><tr><td valign="top" align="center" width="105" style="width:105px;padding-right:14px"><a href="https://quantuminfoway.com/" style="text-decoration:none"><img src="https://quantuminfoway.com/assets/images/brand/logo-email-mark.png" alt="Quantum Infoway Q mark" width="48" height="48" border="0" style="display:block;width:48px;height:48px;border:0;margin:0 auto"><span style="display:block;padding-top:7px;font-size:14px;font-weight:bold;line-height:1.25;color:#17213a">Quantum<br><span style="color:#6352d9">Infoway</span></span></a></td><td valign="top" style="border-left:2px solid #7050ff;padding-left:14px"><strong style="font-size:20px;color:#17213a">${person}</strong><br><span style="color:#657087">${role}</span><br>${contact.replace(' &nbsp;|&nbsp; ','<br>')}${contact?'<br>':''}${site}</td></tr>${reply?'':'<tr><td colspan="2" style="padding-top:9px;font-size:12px;color:#657087">Technology That Powers Business Growth</td></tr>'}</table></td></tr>`;
 if(!body.includes("Technology That Powers Business Growth")) body += '<tr><td style="padding-top:7px;font-size:12px;color:#657087">Technology That Powers Business Growth</td></tr>';
 return `<table role="presentation" cellpadding="0" cellspacing="0" border="0" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.6;color:#17213a;background-color:#ffffff"><tbody><tr><td style="padding-bottom:${style>=5?4:16}px;color:#17213a">Best regards,</td></tr>${body}<tr><td style="padding-top:14px"><table role="presentation" cellpadding="0" cellspacing="0" border="0" width="360" style="width:360px;max-width:100%;font-family:Arial,Helvetica,sans-serif"><tr><td style="border-top:1px solid #e0e3eb;padding-top:8px;font-size:10px;line-height:1.5;color:#657087">This email and any attachments may contain confidential information intended only for the recipient. If you received it in error, please notify the sender and delete it.</td></tr></table></td></tr></tbody></table>`;
}
function render(){
 document.getElementById('styles').innerHTML=['Classic accent','Brand first','Minimal personal','Logo classic','Dark brand banner','Compact logo','Company column'].map((name,i)=>[2,4].includes(i)?'':`<section id="style-${i+1}"><h2>${i+1}. ${name}</h2><p>${['A violet divider with clear contact details.','A company-led introduction for a polished first impression.','A simple, text-only signature that keeps the focus on your message.','Your logo on white, with a subtle violet divider and readable contact details.','Your logo on a dark navy banner, paired with a clean contact block.','A close sign-off and name, with the logo alongside and compact contact details.','A dedicated left column with the Q mark above the full company name.'][i]}</p><div class="variants">${[false,true].map(reply=>`<article class="card ${reply?'reply':''}"><div class="bar"><h3>${reply?'Replies & forwards':'New emails'}</h3><button type="button" data-style="${i}" data-reply="${reply}" aria-label="Copy ${name} signature for ${reply?'replies':'new emails'}">Copy signature</button></div><div class="preview" id="preview-${i}-${reply}">${signature(i,reply)}</div></article>`).join('')}</div></section>`).join('');
 document.querySelectorAll('img').forEach(img=>{if(img.src.endsWith('/logo-email-mark.png'))img.src='/assets/images/brand/logo-email-mark.png';});
}
fields.forEach(id=>document.getElementById(id).addEventListener('input',render));
document.getElementById('styles').addEventListener('click',async event=>{
 const button=event.target.closest('button[data-style]');if(!button)return;
 const preview=document.getElementById(`preview-${button.dataset.style}-${button.dataset.reply}`);
 const status=document.getElementById('status');
 preview.querySelectorAll('img').forEach(img=>{if(img.getAttribute('src').startsWith('/'))img.src='https://quantuminfoway.com'+img.getAttribute('src');});
 try{
  if(navigator.clipboard && window.ClipboardItem){
   await navigator.clipboard.write([new ClipboardItem({'text/html':new Blob([preview.innerHTML.replaceAll('src="/assets/images/', 'src="https://quantuminfoway.com/assets/images/')],{type:'text/html'}),'text/plain':new Blob([preview.innerText],{type:'text/plain'})})]);
  }else{
   const selection=window.getSelection();const range=document.createRange();range.selectNodeContents(preview);selection.removeAllRanges();selection.addRange(range);
   if(!document.execCommand('copy'))throw new Error('Manual copy needed');selection.removeAllRanges();
  }
  status.textContent='Signature copied. Paste it into your email app’s signature settings.';
 }catch(error){
  const range=document.createRange();range.selectNodeContents(preview);const selection=window.getSelection();selection.removeAllRanges();selection.addRange(range);
  status.textContent='Automatic copy is unavailable. The signature is selected—press Ctrl+C (or Command+C), then paste into your email settings.';
 }
});
render();
</script></body></html>
