<?php $this->load->view('header'); ?>
<script>
function downloadClick(id) {
$('#dwnld' + id).fadeIn(500);
}
function edit(p_id,name, org, clnk, email, phone, poc, website, notes, address) {
	$('#editpid').val(p_id);
	$('#editname').val(name);
	$('#editorg').val(org);
	$('#editclnk').val(clnk);
	$('#editemail').val(email);
	$('#editphone').val(phone);
	$('#editpoc').val(poc);
	$('#editwebsite').val(website);
	$('#editnotes').val(notes);
	$('#editaddress').val(address);
}
function editOrg(o_id, parent, name) {
	$('#editorgoid').val(o_id);
	$('#editorgparent').val(parent);
	$('#editorgname').val(name);
}
function full() {
	//var el = $('#viewport');
	var docelem = document.getElementById('viewport');
    if (docelem.requestFullscreen) {
        docelem.requestFullscreen();
    }
    else if (docelem.mozRequestFullScreen) {
        docelem.mozRequestFullScreen();
    }
    else if (docelem.webkitRequestFullscreen) {
        docelem.webkitRequestFullscreen();
    }
    else if (docelem.msRequestFullscreen) {
        docelem.msRequestFullscreen();
    }
		var w = window.outerWidth;
		var h = window.outerHeight;
		var canvas = document.getElementById("viewport");
  	canvas.width = w;
		canvas.height = h;
}
if (document.addEventListener)
{
    document.addEventListener('webkitfullscreenchange', exitHandler, false);
    document.addEventListener('mozfullscreenchange', exitHandler, false);
    document.addEventListener('fullscreenchange', exitHandler, false);
    document.addEventListener('MSFullscreenChange', exitHandler, false);
}

function exitHandler()
{
    if (document.webkitIsFullScreen || (document.mozFullScreen != undefined && document.mozFullScreen) || document.msFullscreenElement != null)
    {
    } else {
			/* Run code on exit */
			var w = 980;
			var h = 900;
			var canvas = document.getElementById("viewport");
			canvas.width = w;
			canvas.height = h;
		}
}
</script>

<div class="page-header" style="background-image:url(<?php echo base_url('website_files/image.jpg'); ?>);">
		<div class='content-limit-1000'>
			<div class="page-header-small color-white text-center">
				<h1 class='size-5 weight-bold'>CONNECTIONS GRAPH</h1>
				<h2 class='size-2 weight-light'></h2>
							</div>
		</div>
	</div>


<style>
.tooltiptext::after {
    content: " ";
    position: absolute;
    bottom: 100%;  /* At the top of the tooltip */
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent transparent black transparent;
}
.tooltiptext {
    display: none;
    width: 320px;
    height: 205px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
    padding: 10px;
    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 2147483647;
}
.contact-type {
    float: left;
}
.contact-value {
    float: right;
}
.reveal-modal {
	z-index: 2147483647;
}
</style>
<div style="background:#f3f3f3">
<div class="large-spacer-50"></div>
<div class="content-limit-1000">
	<div id="rizer" class="row-padding background-white" style="padding-left: 10px; padding-right: 10px;padding-bottom:0">
		<div style="margin-left: 80px; height:40px"></div>
		<div class="row expanded small-centered button-group">
	 	  <a href="#" data-reveal-id="addOrg" class="medium-6 columns button">Add Organization</a>
		  <a href="#" data-reveal-id="addPerson" class="medium-6 columns button">Add Person</a>
		</div>
		<div class="row expanded small-centered button-group">
	 	  <a href="#" onclick="full()" class="medium-12 columns button">Fullscreen</a>
		</div>
		  <canvas style="padding: 0" id="viewport" width="980" height="900"></canvas>
		  <?php foreach($people as $person): ?>
		    <div class="tooltiptext" id="ctct-<?php echo $person->p_id; ?>">
          <h3>Contact Details: <span style="float: right" data-reveal-id="editPerson" onclick="edit(<?php echo $person->p_id; ?>,'<?php echo $person->name; ?>','<?php echo $person->o_id; ?>','<?php echo $person->clnk; ?>','<?php echo $person->email; ?>','<?php echo $person->phone; ?>','<?php echo $person->poc; ?>','<?php echo $person->website; ?>','<?php echo $person->notes; ?>','<?php echo $person->address; ?>')"><u>Edit</u></span></h3>
          <span class="contact-type">Email:</span><span class="contact-value"><?php echo $person->email; ?></span><br>
          <span class="contact-type">Phone:</span><span class="contact-value"><?php echo $person->phone; ?></span><br>
          <span class="contact-type">Rogue Squadron POC: </span><span class="contact-value"><?php echo $person->poc; ?></span><br>
					<span class="contact-type">Address: </span><span class="contact-value"><?php echo $person->address; ?></span><br>
					<span class="contact-type">Website: </span><span class="contact-value"><?php echo $person->website; ?></span><br>
					<span class="contact-type">Notes: </span><span class="contact-value"><?php echo $person->notes; ?></span><br>
					<span class="contact-type">Last Contacted: </span><span class="contact-value">Not Implemented<?php echo $person->last_contacted; ?></span><br>
				</div>
      <?php endforeach; ?>
		  <!-- run from the original source files: -->
		  <script src="<?php echo base_url('website_files/etc.js'); ?>"></script>
		  <script src="<?php echo base_url('website_files/kernel.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/colors.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/primitives.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/graphics.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/easing.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/tween.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/atoms.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/physics.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/system.js'); ?>"></script>
	    <script src="<?php echo base_url('website_files/dev.js'); ?>"></script>

		  <!-- run from the minified library file: -->
		  <script src="<?php echo base_url('website_files/arbor.js'); ?>"></script>

		  <script>
//
//  main.js
//
//  A project template for using arbor.js
//

(function($){

  var Renderer = function(canvas){
    var canvas = $(canvas).get(0)
    var ctx = canvas.getContext("2d");
    var gfx = arbor.Graphics(canvas)
    var particleSystem

    var that = {
      init:function(system){
        //
        // the particle system will call the init function once, right before the
        // first frame is to be drawn. it's a good place to set up the canvas and
        // to pass the canvas size to the particle system
        //
        // save a reference to the particle system for use in the .redraw() loop
        particleSystem = system

        // inform the system of the screen dimensions so it can map coords for us.
        // if the canvas is ever resized, screenSize should be called again with
        // the new dimensions
        particleSystem.screenSize(canvas.width, canvas.height)
        particleSystem.screenPadding(20) // leave an extra 80px of whitespace per side

        // set up some event handlers to allow for node-dragging
        that.initMouseHandling()
      },

      redraw:function(){
        //
        // redraw will be called repeatedly during the run whenever the node positions
        // change. the new positions for the nodes can be accessed by looking at the
        // .p attribute of a given node. however the p.x & p.y values are in the coordinates
        // of the particle system rather than the screen. you can either map them to
        // the screen yourself, or use the convenience iterators .eachNode (and .eachEdge)
        // which allow you to step through the actual node objects but also pass an
        // x,y point in the screen's coordinate system
        //
        ctx.fillStyle = "white"
        ctx.fillRect(0,0, canvas.width, canvas.height)

        particleSystem.eachEdge(function(edge, pt1, pt2){
          // edge: {source:Node, target:Node, length:#, data:{}}
          // pt1:  {x:#, y:#}  source position in screen coords
          // pt2:  {x:#, y:#}  target position in screen coords

          // draw a line from pt1 to pt2
          if(edge.data.link == "basic") {
            ctx.strokeStyle = "rgba(0,0,0, .333)"
          } else if (edge.data.link == "testing") {
            ctx.strokeStyle = "rgba(0,255,0, .333)"
          }  else if (edge.data.link == "using"){
            ctx.strokeStyle = "rgba(255,0,0, .333)"
          }
          ctx.lineWidth = 1
          ctx.beginPath()
          ctx.moveTo(pt1.x, pt1.y)
          ctx.lineTo(pt2.x, pt2.y)
          ctx.stroke()
          ctx.fillStyle = "black";
          ctx.font = 'italic 13px sans-serif';
          ctx.fillText (edge.data.name, (pt1.x + pt2.x) / 2, (pt1.y + pt2.y) / 2);
        })

        particleSystem.eachNode(function(node, pt){
          // node: {mass:#, p:{x,y}, name:"", data:{}}
          // pt:   {x:#, y:#}  node position in screen coords

          // draw a rectangle centered at pt
          var w = 10
          ctx.font = "bold 11px Arial"
          ctx.textAlign = "center"
          //ctx.fillStyle = node.data.fontcolor;
          ctx.fillText(node.data.label, pt.x, pt.y-20)
          ctx.fillStyle = (node.data.alone) ? "orange" : "black"
          ctx.fillRect(pt.x-w/2, pt.y-w/2, w,w)
          $(node.data.contact).css('top', $('#viewport').position().top+pt.y+10+'px');
          $(node.data.contact).css('left', $('#viewport').position().left+pt.x-160+'px')
        })
      },

      initMouseHandling:function(){
        // no-nonsense drag and drop (thanks springy.js)
        var dragged = null;

        // set up a handler object that will initially listen for mousedowns then
        // for moves and mouseups while dragging
        var handler = {
          clicked:function(e){
            var pos = $(canvas).offset();
            _mouseP = arbor.Point(e.pageX-pos.left, e.pageY-pos.top)
            dragged = particleSystem.nearest(_mouseP);

            if (dragged && dragged.node !== null){
              // while we're dragging, don't let physics move the node
              dragged.node.fixed = true
            }
            $(nearest.node.data.contact).toggle();
						if(nearest.node.data.org && nearest.node.data.parent != 0) {
							editOrg(nearest.node.data.oid, nearest.node.data.parent, nearest.node.data.name);
							$('#editOrg').foundation('reveal', 'open');
						}
            $(canvas).bind('mousemove', handler.dragged)
            $(window).bind('mouseup', handler.dropped)

            return false
          },
          dragged:function(e){
            var pos = $(canvas).offset();
            var s = arbor.Point(e.pageX-pos.left, e.pageY-pos.top)

            if (dragged && dragged.node !== null){
              var p = particleSystem.fromScreen(s)
              dragged.node.p = p
            }

            return false
          },

          dropped:function(e){
            if (dragged===null || dragged.node===undefined) return
            if (dragged.node !== null) dragged.node.fixed = false
            dragged.node.tempMass = 1000
            dragged = null
            $(canvas).unbind('mousemove', handler.dragged)
            $(window).unbind('mouseup', handler.dropped)
            _mouseP = null
            return false
          },
          moved:function(e){
            var pos = $(canvas).offset();
            _mouseP = arbor.Point(e.pageX-pos.left, e.pageY-pos.top)
            nearest = particleSystem.nearest(_mouseP);

            if (!nearest.node) return false
            return false
          },
					resize:function(e){
						console.log('Resized');
						particleSystem.screenSize(canvas.width, canvas.height)
					}
        }

        // start listening
        $(canvas).mousedown(handler.clicked);
        $(canvas).mousemove(handler.moved);
				$(window).resize(handler.resize);
      },

    }
    return that
  }

  $(document).ready(function(){
    var sys = arbor.ParticleSystem(10, 100, 0.5) // create the system with sensible repulsion/stiffness/friction
    sys.parameters({gravity:true, fit: true}) // use center-gravity to make the graph settle nicely (ymmv)
    sys.renderer = Renderer("#viewport") // our newly created renderer will have its .init() method called shortly by sys...

    // add some nodes to the graph and watch it go...
    <?php foreach($orgs as $org): ?>
	<?php if($org->parent == NULL) {
		$mass = .75;
	} else {
		$mass = .50;
	} ?>
        sys.addNode('org<?php echo $org->o_id; ?>', { org: true, oid: <?php echo $org->o_id; ?>, name: '<?php echo $org->name; ?>', parent: <?php echo ($org->parent == '') ? 0 : $org->parent; ?>, mass: <?php echo $mass; ?>, label: '<?php echo $org->name; ?>'})
    <?php endforeach; ?>

    <?php foreach($people as $person): ?>
	sys.addNode('pers<?php echo $person->p_id; ?>', { org: false, mass: .5, label: '<?php echo $person->name; ?>', contact: '#ctct-<?php echo $person->p_id; ?>'})
    <?php endforeach; ?>

    <?php foreach($orgs as $org): ?>
        <?php if($org->parent != NULL): ?>
        sys.addEdge('org<?php echo $org->parent; ?>','org<?php echo $org->o_id; ?>', {name: '', link: 'basic'})
        <?php endif; ?>
    <?php endforeach; ?>
    <?php foreach($people as $person): ?>
        sys.addEdge('pers<?php echo $person->p_id; ?>','org<?php echo $person->o_id; ?>', {name: '<?php echo $person->poc; ?>', link: 'basic'})
				<?php if($person->clnk != NULL): ?>
					sys.addEdge('pers<?php echo $person->p_id; ?>','pers<?php echo $person->clnk; ?>', {name: '', link: 'basic'})
				<?php endif; ?>
		<?php endforeach; ?>



    // or, equivalently:
    //
    // sys.graft({
    //   nodes:{
    //     f:{alone:true, mass:.25}
    //   },
    //   edges:{
    //     a:{ b:{},
    //         c:{},
    //         d:{},
    //         e:{}
    //     }
    //   }
    // })

  })

})(this.jQuery)

		  </script>
		<div style="height:30px"></div>
	</div>
</div>
<?php
$parents = array();
foreach($orgs as $org) {
	$parents[$org->o_id] = $org->name;
}
$clnk = array('' => '');
foreach($people as $person) {
	$clnk[$person->p_id] = $person->name;
}
?>
<style>
label {
    color: #000;
}
input[type=submit] {
font-size:17px;font-weight:400;border-radius:4px;border:#ffffff solid 1px;padding:15px 50px 15px 20px;color:#ffffff;display: inline-block;background:url(arrow-white.png) right 20px center no-repeat
}
input[type=submit]:hover {
background:url(arrow-white.png) right 20px center no-repeat #ffffff;color:#2584c6
}
</style>
<div id="addOrg" class="reveal-modal" data-reveal aria-labelledby="addOrg" aria-hidden="true" role="dialog">
	<div class="size-3 color-primary" id="addOrg" >Add Organization</div>
	<form method="post" action="<?php echo site_url('welcome/addGraphOrg'); ?>" class="large-12 color-primary" form="addorg" id="addorg">
		<div class="row">
			<div class="large-8 columns">
				<label>Name
					<input id="name" name="name" required type="text" placeholder="" />
				</label>
			</div>
			<div class="large-4 columns">
				<label>Parent Organization
					<?php echo form_dropdown('parent', $parents, null, 'id="parent" form="addorg"'); ?>
				</label>
			</div>
		</div>
		<div class="row">
			<p>Organizations are the base structure of the graph. They do not hold any specific information except a parent and a name.</p>
		</div>
		<?php
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);
		?>
		<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
		<div class="row">
	  	<div class="large-12 columns">
	    	<input value="Add To Graph" class="blue" style="width: 100%;" type="submit">
	    </div>
	  </div>
	</form>
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<div id="editOrg" class="reveal-modal" data-reveal aria-labelledby="editOrg" aria-hidden="true" role="dialog">
	<div class="size-3 color-primary" id="editOrg" >Edit Organization</div>
	<form method="post" action="<?php echo site_url('welcome/editGraphOrg'); ?>" class="large-12 color-primary" form="editorgg" id="editorgg">
		<div class="row">
			<div class="large-8 columns">
				<label>Name
					<input id="editorgname" name="editorgname" required type="text" placeholder="" />
				</label>
			</div>
			<div class="large-4 columns">
				<label>Parent Organization
					<?php echo form_dropdown('editorgparent', $parents, null, 'id="editorgparent" form="editorgg"'); ?>
				</label>
			</div>
		</div>
		<div class="row">
			<p>Organizations are the base structure of the graph. They do not hold any specific information except a parent and a name.</p>
		</div>
		<?php
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);
		?>
		<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
		<input type="hidden" name="editorgoid" id="editorgoid" />
		<div class="row">
	  	<div class="large-12 columns">
	    	<input value="Edit Graph" class="blue" style="width: 100%;" type="submit">
	    </div>
	  </div>
	</form>
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<div id="addPerson" class="reveal-modal" data-reveal aria-labelledby="addPerson" aria-hidden="true" role="dialog">
	<div class="size-3 color-primary" id="addPerson" >Add Person</div>
	<form method="post" action="<?php echo site_url('welcome/addGraphPerson'); ?>" class="large-12 color-primary" form="addperson" id="addperson">
		<div class="row">
			<div class="large-6 columns">
				<label>Name
					<input id="name" name="name" type="text" placeholder="" />
				</label>
			</div>
			<div class="large-3 columns">
				<label>Organization
					<?php echo form_dropdown('org', $parents, null, 'id="org" form="addperson"'); ?>
				</label>
			</div>
			<div class="large-3 columns">
				<label>Cross Link
					<?php echo form_dropdown('clnk', $clnk, null, 'id="clnk" form="addperson"'); ?>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label>Email Address
					<input id="email" name="email" type="text" placeholder="" />
				</label>
			</div>
			<div class="large-4 columns">
				<label>Phone
					<input id="phone" name="phone" type="text" placeholder="" />
				</label>
			</div>
			<div class="large-4 columns">
				<label>RS POC
					<input id="poc" name="poc" type="text" placeholder="" />
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
				<label>Address
					<input id="address" name="address" type="text" placeholder="" />
				</label>
			</div>
			<div class="large-6 columns">
				<label>Website
					<input id="website" name="website" type="text" placeholder="" />
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Notes
					<input id="notes" name="notes" type="text" placeholder="" />
				</label>
			</div>
		</div>
		<?php
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);
		?>
		<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
		<div class="row">
	  	<div class="large-12 columns">
	    	<input value="Add To Graph" class="blue" style="width: 100%;" type="submit">
	    </div>
	  </div>
	</form>
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="editPerson" class="reveal-modal" data-reveal aria-labelledby="editPerson" aria-hidden="true" role="dialog">
	<div class="size-3 color-primary" id="editPerson" >Edit Person</div>
	<form method="post" action="<?php echo site_url('welcome/editGraphPerson'); ?>" class="large-12 color-primary" form="editperson" id="editperson">
		<div class="row">
			<div class="large-6 columns">
				<label>Name
					<input id="editname" name="editname" type="text" placeholder="" />
				</label>
			</div>
			<div class="large-3 columns">
				<label>Organization
					<?php echo form_dropdown('editorg', $parents, null, 'id="editorg" form="editperson"'); ?>
				</label>
			</div>
			<div class="large-3 columns">
				<label>Cross Link
					<?php echo form_dropdown('editclnk', $clnk, null, 'id="editclnk" form="editperson"'); ?>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label>Email Address
					<input id="editemail" name="editemail" type="text" placeholder="" />
				</label>
			</div>
			<div class="large-4 columns">
				<label>Phone
					<input id="editphone" name="editphone" type="text" placeholder="" />
				</label>
			</div>
			<div class="large-4 columns">
				<label>RS POC
					<input id="editpoc" name="editpoc" type="text" placeholder="" />
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
				<label>Address
					<input id="editaddress" name="editaddress" type="text" placeholder="" />
				</label>
			</div>
			<div class="large-6 columns">
				<label>Website
					<input id="editwebsite" name="editwebsite" type="text" placeholder="" />
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Notes
					<input id="editnotes" name="editnotes" type="text" placeholder="" />
				</label>
			</div>
		</div>
		<?php
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);
		?>
		<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
		<input type="hidden" name="editpid" id="editpid" />
		<div class="row">
	  	<div class="large-12 columns">
	    	<input value="Edit Graph" class="blue" style="width: 100%;" type="submit">
	    </div>
	  </div>
	</form>
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<?php $this->load->view('footer'); ?>
